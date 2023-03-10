<?php

class Authentication
{

    // user login
    public static function login( $email, $password )
    {

        $user_id = false;

        $user = DB::connect()->select(
            'SELECT * FROM users WHERE email = :email',
            [
                'email' => $email
            ]
            );

        // if $user is valid ,then return $user array
        if ( $user ) {
            
            //proceed to verufy password
            if ( password_verify( $password, $user->password ) ) {
                $user_id = $user->id;
            }

        }

        return $user_id;
    }


    // Signup user
    public static function signup( $name, $email, $password )
    {
        return DB::connect()->insert(
            'INSERT INTO users ( name, email, password )
            VALUES ( :name, :email, :password)',
            [
                'name' => $name,
                'email' => $email,
                'password' => password_hash( $password, PASSWORD_DEFAULT ),
            ]
        );
    }


    // user logout
    public static function logout()
    {
        unset( $_SESSION['user'] );
    }


    // check if user is logged in
    public static function isLoggedIn()
    {
        return isset( $_SESSION['user'] );
    }

    /**
     * assign user's session
     */
    public static function setSession( $user_id )
    {
        // load the user data from database based on $user_id provided
        $user = DB::connect()->select(
            'SELECT * from users where id = :id',
            [
                'id' => $user_id
            ]
        );

        // assign it to $_SESSION['user']
        $_SESSION['user'] = [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'role' => $user->role
        ];


    }




    // retrieve user's role
    public static function getRole()
    {
        if( self::isLoggedIn() ) {
            return $_SESSION['user']['role'];
        }
        return false;
    }


    // check if the current logged in user is admin
    public static function isAdmin()
    {
        return self::getRole() == 'admin';
    }


    // check if the current logged in user is editor
    public static function isEditor()
    {
        return self::getRole() == 'editor';
    }

     // check if the current logged in user is teacher
     public static function isTeacher()
     {
         return self::getRole() == 'teacher';
     }

    // chceck if the current logged in user is student
    public static function isStudent()
    {
        return self::getRole() == 'student';
    }


    public static function whoCanAccess( $role )
    {
        // make sure user is logged in
        if ( self::isLoggedIn() ) {
            switch( $role ) {
                // if the $role is admin
                case 'admin':
                    return self::isAdmin();
                case 'editor':
                    return self::isEditor() || self::isAdmin();
                case 'teacher':
                    return self::isTeacher() || self::isEditor() || self::isAdmin();
                case 'student':
                    return self::isStudent() || self::isTeacher() || self::isEditor() || self::isAdmin();
            } // end - switch
        }

        // if no condition met, we'll return false
        return false;
    }

}