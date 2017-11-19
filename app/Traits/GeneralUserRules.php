<?php

namespace App\Traits;

use Illuminate\Support\Facades\Validator;

trait GeneralUserRules {

	protected $rules = [
		'email' => 'required|email|unique:users',
		'name' => 'required|min:3|max:30',
		'password' => 'required|min:8|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9]).*$/',
		'password_confirmation' => 'required_with:password|same:password',
		'role' => 'nullable|exists:roles,id'
	];

	protected $customMessages = [
		'name.required' => 'Please enter your First Name',
		'name.min' => 'First name should be atleast 3 characters',
		'name.max' => 'First name exceeds 20 characters',
		'email.required' => 'Please enter a valid email address',
		'email.email' => 'Please enter a valid email address',
		'email.unique' => 'The email you entered already taken',
		'last_name.required' => 'Please enter your Last Name',
		'last_name.min' => 'Last name should be atleast 3 characters',
		'last_name.max' => 'Last name exceeds 20 characters',
		'password.required' => 'Please enter a password',
		'password.regex' => 'Password to have minimum 8 characters, containing at least 1 character and 1 number',
		'password.min' => 'The password must be at least 8 characters',
		'password_confirmation' => 'Please confirm your Password',
	];

	public function validateUserData($request)
	{
		$validator = Validator::make($request->all(), $this->rules, $this->customMessages);

		return $validator;
	}

	public function validateUserDataOnUpdate($request, $model)
	{
		$this->rules['password'] = 'nullable|min:8|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9]).*$/';
		$this->rules['email'] = 'required|email|unique:users,email,'.$model->id;

		return $this->validateUserData($request);
	}
}