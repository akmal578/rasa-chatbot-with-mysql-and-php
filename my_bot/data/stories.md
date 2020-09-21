## fallback story
* out_of_scope
  - utter_fallback
  - action_default_fallback

## normal path1
* greet
 - utter_greet
* feedback
 - user_form
 - form{"name":"user_form"}
 - form{"name": null}
 - utter_submit
* affirm 
  - action_submit
  - action_restart

## deny path
* deny
  - utter_goodbye
  - action_restart

## search path
* greet
 - utter_greet
* search_user{"name":"john","age":"22"}
 - action_search_user

## search path 2
* greet
 - utter_greet
* search_user{"name":"john","phonenumber":"013-7774669"}
 - action_search_user

## search based on cuisine part 1
* greet
 - utter_greet
* search_cuisine{"cuisine":"chinese"}
 - utter_ask_location
* state_type{"state":"johor"}
 - utter_ask_zip
* affirm
 - utter_give
* zip_type{"zip":"81900"}
 - action_search_cuisine_state_zip
 - utter_goodbye
 - action_restart

## search based on cuisine part 2
* greet
 - utter_greet
* search_cuisine{"cuisine":"chinese"}
 - utter_ask_location
* state_type{"state":"johor"}
 - utter_ask_zip
* deny
 - action_search_cuisine_state
 - utter_goodbye
 - action_restart

## search based on cuisine and zip code
* greet
 - utter_greet
* search_cuisine{"cuisine":"chinese","zip":"74500"}
 - action_search_cuisine_zip
 - utter_goodbye
 - action_restart

## search based on cuisine and state
* greet
 - utter_greet
* search_cuisine{"cuisine":"chinese","state":"johor"}
 - action_search_cuisine_state
 - utter_goodbye
 - action_restart

## search based on cuisine and city
* greet
 - utter_greet
* search_cuisine{"cuisine":"chinese","city":"kota tinggi"}
 - action_search_cuisine_city
 - utter_goodbye
 - action_restart