<?php
use Illuminate\Support\Str;

//const pour les pages habilitations
define("PAGELIST", "liste");
define("PAGECREATEFORM", "create");
define("PAGEEDITFORM", "edit");

//const pour les pages articles
define("PAGELISTEARTICLE", "listeArticle");
define("PAGECREATEARTICLE", "createArticle");
define("PAGEEDITARTICLE", "edit");

//constant pour réinitialisé le mot de passe 
define("DEFAULTPASSWORD", "password");


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

//remove operateur sur les chiffres cles

function remove_operateur($text)
{
    return str_replace(["+", "-"], "", $text);
} 

//Pour menu et lien dynamique
function currentRouteIs(string $route): bool{
    return request()->route()->getName() === $route;
}

function currentRouteContains(\Illuminate\Support\Collection $routes): bool{
    return $routes->contains(request()->route()->getName());
}

if (!function_exists('getCopyrightYears')) 
{
    function getCopyrightYears()
    {
        $currentYear = date('Y');
        $startYear = 2022;

        if ($currentYear > $startYear) {
            return $currentYear;
        } else {
            return $startYear;
        }
    }
}

$nonce = Str::random(16);


