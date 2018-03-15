<?php

/*
Copyright 2016-2018 Daniil Gentili
(https://daniil.it)
This file is part of MadelineProto.
MadelineProto is free software: you can redistribute it and/or modify it under the terms of the GNU Affero General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
MadelineProto is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
See the GNU Affero General Public License for more details.
You should have received a copy of the GNU General Public License along with MadelineProto.
If not, see <http://www.gnu.org/licenses/>.
*/

namespace danog\MadelineProto\Wrappers;

trait Templates
{
    public function web_echo($message = '')
    {
        switch ($this->authorized) {
            case self::NOT_LOGGED_IN:
            echo $this->web_echo_template('Enter your phone number<br><b>'.$message.'</b>', '<input type="text" name="phone_number" placeholder="Phone number" required/>');
            break;

            case self::WAITING_CODE:
            echo $this->web_echo_template('Enter your code<br><b>'.$message.'</b>', '<input type="text" name="phone_code" placeholder="Phone code" required/>');
            break;

            case self::WAITING_PASSWORD:
            echo $this->web_echo_template('Enter your password<br><b>'.$message.'</b>', '<input type="password" name="password" placeholder="Hint: '.$this->authorization['hint'].'" required/>');
            break;

            case self::WAITING_SIGNUP:
            echo $this->web_echo_template('Sign up please<br><b>'.$message.'</b>', '<input type="text" name="first_name" placeholder="First name" required/><input type="text" name="last_name" placeholder="Last name"/>');
            break;
        }
    }
    public function web_echo_template($message, $form) {
        return '<!DOCTYPE html>
        <html>
        <head>
        <title>MadelineProto</title>
        </head>
        <body>
        <h1>MadelineProto</h1>
        <form method="POST">
        '.$form.'
        <button type="submit"/>Go</button>
        </form>
        <p>'.$message.'</p>
        </body>
        </html>';

    }
}