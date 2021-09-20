<?php
use Illuminate\Support\Str;



//recuperation du prenom et nom 
function userFullName(){
    return auth()->user()->prenom ." ". auth()->user()->nom;
}

//recuperation 
function getRolesName(){
    $rolesName = ""; 
    $i = 0; 
    foreach(auth()->user()->roles as $role){
        $rolesName .= $role->nomRole;

        if($i < sizeof(auth()->user()->roles) - 1){
            $rolesName .= ", ";
        }
        $i++;
    }
    return $rolesName;
}

// function setMenuClass($route, $classe){
//     $routeActuel = request()->route()->getName();

//     if(contains($routeActuel, $route)){
//         return $classe; 
//     }
//     return "";
// }

function setMenuClass($route, $classe){
    $routeActuel = request()->route()->getName();

    if(str_contains($routeActuel, $route) ){
        return $classe;
    }
    return "";
}

function setMenuActive($route){
    $routeActuel = request()->route()->getName();

    if($routeActuel === $route){
        return "active";
    }
    return "";
}


