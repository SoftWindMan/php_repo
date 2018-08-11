<?php

//年级信息 数据库 -》文字
function databaseToGradeInfo($gradeDatabase) {
    $grade_name = '';

    switch ($gradeDatabase) {
        case 1:
            $grade_name = ONE_GRADE;
            break;
        case 2:
            $grade_name = TWO_GRADE;
            break;
        case 3:
            $grade_name = THREE_GRADE;
            break;
        case 4:
            $grade_name = FOUR_GRADE;
            break;
        case 5:
            $grade_name = FIVE_GRADE;
            break;
        case 6:
            $grade_name = SIX_GRADE;
            break;
        case 7:
            $grade_name = SMALL_GRADE;
            break;
        case 8:
            $grade_name = MIDDLE_GRADE;
            break;
        case 9:
            $grade_name = BIG_GRADE;
            break;
    }

    return $grade_name;
}

//学生类型信息 数据库 -》文字
function databaseToStutypeInfo($stutypeDatabase) {
    $stu_type = '';

    switch ($stutypeDatabase) {
        case 1:
            $stu_type = ONE_LEVEL;
            break;
        case 2:
            $stu_type = TWO_LEVEL;
            break;
        case 3:
            $stu_type = THREE_LEVEL;
            break;
        case 4:
            $stu_type = FOUR_LEVEL;
            break;
    }

    return $stu_type;
}

//年级信息 文字 -》数据库
function gradeInfoToData($gradeInfo) {
    $gradeNum = 0;

    switch ($gradeInfo) {
        case ONE_GRADE:
            $gradeNum = 1;
            break;
        case TWO_GRADE:
            $gradeNum = 2;
            break;
        case THREE_GRADE:
            $gradeNum = 3;
            break;
        case FOUR_GRADE:
            $gradeNum = 4;
            break;
        case FIVE_GRADE:
            $gradeNum = 5;
            break;
        case SIX_GRADE:
            $gradeNum = 6;
            break;
        case SMALL_GRADE:
            $gradeNum = 7;
            break;
        case MIDDLE_GRADE:
            $gradeNum = 8;
            break;
        case BIG_GRADE:
            $gradeNum = 9;
            break;
    }

    return $gradeNum;
}

//学生类型信息 文字 -》数据库
function stutypeInfoToData($stutypeInfo) {
    $stuTypeNum = 0;

    switch ($stutypeInfo) {
        case ONE_LEVEL:
            $stuTypeNum = 1;
            break;
        case TWO_LEVEL:
            $stuTypeNum = 2;
            break;
        case THREE_LEVEL:
            $stuTypeNum = 3;
            break;
        case FOUR_LEVEL:
            $stuTypeNum = 4;
            break;
    }

    return $stuTypeNum;
}

//性别 文字 -》数据库
function sexinfoTodata($sexInfo) {
    $sexNum = 0;

    switch ($sexInfo) {
        case MALE:
            $sexNum = 1;
            break;
        case FEMALE:
            $sexNum = 0;
            break;
    }

    return $sexNum;
}

//性别 数据库 -》文字
function dataToSexInfo($sexNum) {
    $sexInfo = '';

    switch ($sexNum) {
        case 1:
            $sexInfo = MALE;
            break;
        case 0:
            $sexInfo = FEMALE;
            break;
    }

    return $sexInfo;
}