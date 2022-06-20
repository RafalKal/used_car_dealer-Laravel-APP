<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    /**
     * Display register page.
     *
     * @return Application|Factory|View
     */
    public function showRegister()
    {
        return view('pages.register');
    }

    /**
     * Display login page.
     *
     * @return Application|Factory|View
     */
    public function showLogin()
    {
        return view('pages.login');
    }

    /**
     * Handle account registration request
     *
     * @param RegisterRequest $request
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated());
        $user->assignRole('user');
        auth()->login($user);

        return redirect('/')->with('success', "Account successfully registered.");
    }

    /**
     * Handle account login request
     *
     * @param LoginRequest $request
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();

        if(!Auth::validate($credentials)) {
            return redirect()->to('login')
                ->withErrors(trans('auth.failed'));
        }

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        return $this->authenticated($request, $user);
    }

    /**
     * Handle response after user authenticated
     *
     * @param Request $request
     * @param Auth $user
     *
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(Request $request, $user)
    {
        return redirect()->intended();
    }

    /**
     * Log out account user.
     *
     * @return \Illuminate\Routing\Redirector
     */
    public function logout()
    {
        Session::flush();

        Auth::logout();

        return redirect('login');
    }
}
