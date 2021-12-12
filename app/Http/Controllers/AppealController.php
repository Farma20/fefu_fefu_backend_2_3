<?php

namespace App\Http\Controllers;

use App\Models\Appeal;
use Illuminate\Http\Request;

class AppealController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $errors = [];

        $success = $request->session()->get('success', false);

        if($request->isMethod('POST')){
            $name = $request->input('name');
            $phone = $request->input('phone');
            $email = $request->input('email');
            $message = $request->input('message');

            if($name === null)
                $errors['name'] = 'Введите имя';
            else if(strlen($name) > 20)
                $errors['name'] = 'Длина имени должна быть меньше 20 символов';

            if($phone === null & $email === null)
                $errors['contacts'] = 'Одно из полей контактных данных должно быть заполнено';
            if(strlen($phone) !== 11)
                $errors['phone'] = 'Длина номера телефона должна составлять 11 символов. Проверьте правильность введеного номера';
            if(strlen($email) > 100)
                $errors['email'] = 'Длина электронной почты должна быть меньше 100 символов';

            if($message === null)
                $errors['message'] = 'Введите ваше сообщение';
            else if(strlen($message) > 100)
                $errors['message'] = 'Длина вашего сообщения должна быть меньше 100 символов';

            if (count($errors) === 0){
                $appeal = new Appeal;
                $appeal->name = $name;
                $appeal->phone = $phone;
                $appeal->email = $email;
                $appeal->message = $message;
                $appeal->save();

                $success = true;
                return redirect()
                    ->route('appeal')
                    ->with('success', $success);
            }
            else
                $request->flash();

        }

        return view('appeal', ['errors'=>$errors, 'success'=>$success]);
    }
}
