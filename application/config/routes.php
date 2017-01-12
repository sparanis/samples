<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.";04_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "spotch";
$route['register'] = "spotch/register";
$route['account'] = "spotch/account";
$route['find_team'] = "teams/find_team";
$route['find_game'] = "games/find_game";
$route['create'] = "teams/create";
$route['create_game'] = "games/create_game";
$route['information'] = "spotch/information";
$route['team_details'] = "teams/team_details";
$route['game_details'] = "games/game_details";
$route['announcement'] = "spotch/announcement";
$route['request'] = "spotch/request";
$route['previous_games'] = "spotch/previous_games";
$route['guide'] = "spotch/guide";

$route['login'] = 'login/index';
$route['login/(:num)/(:num)'] = 'login/index/$1/$2';
$route['404_override'] = '';

$route['verify/(:any)'] = 'verify/index/$1';


/* End of file routes.php */
/* Location: ./application/config/routes.php */