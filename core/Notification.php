<?php


class Notification
{

//    public static function getNotification($notification, $notificationArray)
//    {
//        if (!in_array($notification, $notificationArray)) {
//            $notification = '';
//        }
//        return "<span class='errorMessage'>$notification</span>";
//    }

    //REGISTRATION
    public static $usernameReuired = '"Username Is Required';
    public static $usernameLength = 'Your Username Must Contain Be Between 2 And 25 Characters';
    public static $usernameExists = 'This Username Already Exists';
    public static $usernameLettersAndWhiteSpace = 'Only Letters And White Space Allowed';

    public static $emailRequired = 'Email Is Required';
    public static $emailExists = 'This Email Already Exists';
    public static $invalidEmail = 'Invalid Email';

    public static $firstnameRequired = 'First Name Is Required';
    public static $firstnameLettersAndWhiteSpace = 'Only Letters And White Space Allowed';

    public static $lastnameRequired = 'Last Name Is Required';
    public static $lastnameLettersAndWhiteSpace = 'Only Letters And White Space Allowed';

    public static $passwordRequired = 'Password Is Required';
    public static $confirmPassword = 'You Have To Confirm Your Password';
    public static $passwordDoesntMatch = 'Password Doesn\'t Match';
    public static $passwordLength = 'Your Password Must Be Between 8 And 25 Characters';
    public static $passwordMustContainNumber = 'Your Password Must Contain At Least 1 Number!';
    public static $passwordMustContainCapLetter = 'Your Password Must Contain At Least 1 Capital Letter!';

    public static $registrationSuccess = 'Congratulations, You Have Been Registered!';

    //LOGIN
    public static $loginError = 'Your Username Or Password Is Not Correct';

    //PRODUCT
    public static $addedProduct = 'New Product Was Successfully Added';
    public static $editedProduct = 'The Product Was Successfully Updated';

    //ORDER
    public static $deletedOrder = 'Order Information Was Deleted';

    //CATEGORY
    public static $addedCategory = 'New Category Was Successfully Added';
    public static $editedCategory = 'The Category Was Successfully Edited';
    public static $deletedCategory = 'The Category Was Successfully Deleted';

    //REPORT
    public static $deletedReport = 'Report Was Deleted';

    //USER


}