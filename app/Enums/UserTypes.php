<?php

namespace App\Enums;

enum UserTypes: int
{
    case ADMINISTRATOR = 1;
    case PROFESSOR = 2;
    case STUDENT = 3;
}
