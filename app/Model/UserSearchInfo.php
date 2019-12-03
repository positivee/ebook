<?php


namespace App\Model;

use App\Dto\User\UserFetchInput;
use App\Dto\User\UserOutputFactory;
use Illuminate\Support\Facades\DB;

class UserSearchInfo
{
    public function showUserInfo(UserFetchInput $fetchInput) : array {
        $allSelectedInfo = DB::table('users')
            ->select('users.id','users.name', 'users.surname', 'users.email');

        if($fetchInput->getUser()) {
            $allSelectedInfo->where('users.id', '=' , $fetchInput->getUser()->id);
        }

        $userOutputArray = [];

        foreach ($allSelectedInfo->get() as $info) {

            $userOutputArray[] = UserOutputFactory::createFromRow($info);
        }

        return $userOutputArray;
    }


}