<?php

namespace App\Http\Controllers;

use Etore\User\Exception\UserException;
use Etore\User\UseCases\ChangePassword\UseCase as ChangePasswordUseCase;
use Etore\User\UseCases\Login\UseCase as LoginUseCase;
use Etore\User\UseCases\Logout\UseCase as LogoutUseCase;
use Etore\User\UseCases\Register\UseCase as RegisterUseCase;
use Etore\User\UseCases\ResetPassword\UseCase as ResetPasswordUseCase;
use Etore\User\UseCases\Profile\UseCase as ProfileUseCase;
use Etore\User\UseCases\GetCoupon\UseCase as GetCouponUseCase;
use Illuminate\Http\Request;
use Etore\User\UseCases\EditProfile\UseCase as EditProfileUseCase;
use Etore\User\UseCases\EditProfile\Request as EditProfileRequest;
use Etore\User\UseCases;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $useCase = new LoginUseCase();
        return response()->json($useCase->execute($email, $password));
    }

    public function register(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $passwordConfirm = $request->input('passwordConfirm');
        $useCase = new RegisterUseCase();
        return response()->json($useCase->execute($email, $password, $passwordConfirm));
    }

    public function getProfile(Request $request)
    {
        try {
            $req = new UseCases\GetProfile\Request(['token' => $request->cookie('token')]);
            $useCase = new UseCases\GetProfile\UseCase();
            $response = $useCase->execute($req);
            return response()->json($response->format());
        } catch (UserException $e) {
            return response()->json($e->format())->setStatusCode($e->getStatusCode());
        } catch (\Throwable $th) {
            return response()->json(['errors' => ['code' => 9999, 'msg' => '系統錯誤']])->setStatusCode(500);
        }
    }

    public function logout(Request $request)
    {
        $token = $request->cookie('token');
        $useCase = new LogoutUseCase();
        $result = $useCase->execute($token);

        return response()->json($result);
    }

    public function resetPassword(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $passwordConfirm = $request->input('passwordConfirm');
        $useCase = new ResetPasswordUseCase();
        $result = $useCase->execute($email, $password, $passwordConfirm);

        return response()->json($result);
    }

    public function changePassword(Request $request)
    {
        $token = $request->cookie('token');
        $password = $request->input('password');
        $passwordConfirm = $request->input('passwordConfirm');
        $useCase = new ChangePasswordUseCase();
        $result = $useCase->execute($token, $password, $passwordConfirm);

        return response()->json($result);
    }

    public function editProfile(Request $request)
    {
        try {
            $req = new EditProfileRequest([
                'token' => $request->cookie('token'), 'nickname' => $request->input('nickname'),
                'avatarUrl' => $request->input('avatarUrl')
            ]);
            $useCase = new EditProfileUseCase();
            $response = $useCase->execute($req);
            return response()->json($response->format());
        } catch (UserException $e) {
            return response()->json($e->format())->setStatusCode($e->getStatusCode());
        } catch (\Throwable $th) {
            return response()->json(['errors' => ['code' => 9999, 'msg' => '系統錯誤']])->setStatusCode(500);
        }
    }
}
