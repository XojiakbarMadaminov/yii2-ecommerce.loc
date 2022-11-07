<?php

function isGuest(){
    return Yii::$app->user->isGuest;
}
function currUserId(){
    return Yii::$app->user->id;
}
function params($key){
    return Yii::$app->params[$key];
}