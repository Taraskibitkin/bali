<?php

namespace Multiple\Frontend\Forms;

use Multiple\Frontend\Libs\Helper;
use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Check;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Submit;

use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Identical;
use Phalcon\Validation\Validator\Confirmation;

use Multiple\Frontend\Libs;


class RegistrationForm extends Form
{
    public function initialize($entity = null, $options = null)
    {

//        $helper = new Helper();
//        $t = $helper->getTranslation();

        //NAME
        $email = new Text('reg_name');
        $email->setLabel(  ('imya'));
        $email->setFilters('email');
        $email->addValidators([

            new PresenceOf(['message' => 'Name is required']),

        ]);
        $this->add($email);


        //SOURNAME
        $email = new Text('reg_sourname');
        $email->setLabel( ('familiya') );
        $email->setFilters('email');
        $email->addValidators([
            new PresenceOf(['message' => 'Sourname is required']),
        ]);
        $this->add($email);





        // Email
        $email = new Text('reg_email');
        $email->setLabel('E-mail');
        $email->setFilters('email');
        $email->addValidators([
            new PresenceOf(['message' => 'E-mail is required']),
            new Email([     'message' => 'E-mail is not valid'])
        ]);
        $this->add($email);





        // Password
        $password = new Password('reg_password');
        $password->setLabel( ('parol'));
        $password->addValidators([
            new PresenceOf(['message' => 'Password is required']),
            new StringLength([
                    'min' => 6,
                    'messageMinimum' => 'Значение поля Password слишком короткое'
                ]),
            new Confirmation([
                'message' => 'Password doesn\'t match confirmation',
                'with' => 'reg_pass_rep'
            ])
        ]);
        $this->add($password);




        //Repeat Password
        $confirmPassword = new Password('reg_pass_rep');
        $confirmPassword->setLabel( ('povtor parol') );
        $confirmPassword->addValidators([
            new PresenceOf([
                'message' => 'The confirmation password is required'
            ])
        ]);
        $this->add($confirmPassword);




       //CSRF
        $csrf = new Hidden('csrf');
        $csrf->addValidator(new Identical(array(
            'value' => $this->security->getSessionToken(),
            'message' => 'CSRF validation failed'
        )));
        $this->add($csrf);
    }
}