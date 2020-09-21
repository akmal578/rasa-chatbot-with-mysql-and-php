# This files contains your custom actions which can be used to run
# custom Python code.

from typing import Any, Text, Dict, List, Union

from rasa_sdk import Action, Tracker
from rasa_sdk.executor import CollectingDispatcher
from rasa_sdk.forms import FormAction
from rasa_core_sdk.events import Restarted
import pymysql

class ActionCuisineC(Action): 
# search based on cuisine -> zip
    def name(self) -> Text: 
        #Unique identifier of the form
        return "action_search_cuisine_zip"

    def run(self, dispatcher: CollectingDispatcher, 
            tracker: Tracker, 
            domain: Dict[Text, Any]) -> List[Dict[Text, Any]]: 

        cuisine = tracker.get_slot("cuisine")
        zip = tracker.get_slot("zip")

        conn = pymysql.connect(
            host="localhost", 
            user="root", 
            password="", 
            database="my_db" 
        )
        cur = conn.cursor()
        sql = 'SELECT * FROM loc_data WHERE foodtype LIKE "%{}%" AND zipcode LIKE "%{}%"'.format(cuisine, zip)
        cur.execute(sql)
        result = cur.fetchall()
        if len(result) > 0:
            for row in result:
                print('id: ', row[0])
                userid = row[1]
                a = row[2]
                b = row[3]
                c = row[4]
                d = row[5]
                e = row[6]
                f = row[7]

                dispatcher.utter_message("Here is the information\nname: {}\nAddress: {}\nZip: {}\nCity: {}\nState: {}\n\n".format(a, b, c, d, e))
        else:
            dispatcher.utter_message("No data found in the database, please try again.")
        conn.close()
        return []

class ActionCuisineB(Action): 
# search based on cuisine -> city
    def name(self) -> Text: 
        #Unique identifier of the form
        return "action_search_cuisine_city"

    def run(self, dispatcher: CollectingDispatcher, 
            tracker: Tracker, 
            domain: Dict[Text, Any]) -> List[Dict[Text, Any]]: 

        cuisine = tracker.get_slot("cuisine")
        city = tracker.get_slot("city")

        conn = pymysql.connect(
            host="localhost", 
            user="root", 
            password="", 
            database="my_db" 
        )
        cur = conn.cursor()
        sql = 'SELECT * FROM loc_data WHERE foodtype LIKE "%{}%" AND city LIKE "%{}%"'.format(cuisine, city)
        cur.execute(sql)
        result = cur.fetchall()
        if len(result) > 0:
            for row in result:
                print('id: ', row[0])
                userid = row[1]
                a = row[2]
                b = row[3]
                c = row[4]
                d = row[5]
                e = row[6]
                f = row[7]

                dispatcher.utter_message("Here is the information\nname: {}\nAddress: {}\nZip: {}\nCity: {}\nState: {}\n\n".format(a, b, c, d, e))
        else:
            dispatcher.utter_message("No data found in the database, please try again.")
        conn.close()
        return []


class ActionCuisineA(Action): 
# search based on cuisine -> state
    def name(self) -> Text: 
        #Unique identifier of the form
        return "action_search_cuisine_state"

    def run(self, dispatcher: CollectingDispatcher, 
            tracker: Tracker, 
            domain: Dict[Text, Any]) -> List[Dict[Text, Any]]: 

        cuisine = tracker.get_slot("cuisine")
        state = tracker.get_slot("state")

        conn = pymysql.connect(
            host="localhost", 
            user="root", 
            password="", 
            database="my_db" 
        )
        cur = conn.cursor()
        sql = 'SELECT * FROM loc_data WHERE foodtype LIKE "%{}%" AND state LIKE "%{}%"'.format(cuisine, state)
        cur.execute(sql)
        result = cur.fetchall()
        if len(result) > 0:
            for row in result:
                print('id: ', row[0])
                userid = row[1]
                a = row[2]
                b = row[3]
                c = row[4]
                d = row[5]
                e = row[6]
                f = row[7]

                dispatcher.utter_message("Here is the information\nname: {}\nAddress: {}\nZip: {}\nCity: {}\nState: {}\n\n".format(a, b, c, d, e))
        else:
            dispatcher.utter_message("No data found in the database, please try again.")
        conn.close()
        return []


class ActionCuisine(Action): 
# search based on cuisine -> state and zip
    def name(self) -> Text: 
        #Unique identifier of the form
        return "action_search_cuisine_state_zip"

    def run(self, dispatcher: CollectingDispatcher, 
            tracker: Tracker, 
            domain: Dict[Text, Any]) -> List[Dict[Text, Any]]: 

        cuisine = tracker.get_slot("cuisine")
        state = tracker.get_slot("state")
        zip = tracker.get_slot("zip")

        print(cuisine, state, zip)

        conn = pymysql.connect(
            host="localhost", 
            user="root", 
            password="", 
            database="my_db" 
        )
        cur = conn.cursor()
        sql = 'SELECT * FROM loc_data WHERE foodtype LIKE "%{}%" AND state LIKE "%{}%" AND zipcode = "{}"'.format(cuisine, state, zip)
        cur.execute(sql)
        result = cur.fetchall()
        if len(result) > 0:
            for row in result:
                print('id: ', row[0])
                userid = row[1]
                a = row[2]
                b = row[3]
                c = row[4]
                d = row[5]
                e = row[6]
                f = row[7]

                dispatcher.utter_message("Here is the information\nname: {}\nAddress: {}\nZip: {}\nCity: {}\nState: {}\n\n".format(a, b, c, d, e))
        else:
            dispatcher.utter_message("No data found in the database, please try again.")
        conn.close()
        return []
        

class ActionSearch(Action): 

    def name(self) -> Text: 
        #Unique identifier of the form
        return "action_search_user"

    def run(self, dispatcher: CollectingDispatcher, 
            tracker: Tracker, 
            domain: Dict[Text, Any]) -> List[Dict[Text, Any]]: 
            
        Name = tracker.get_slot("name")
        Gender = tracker.get_slot("gender")

        conn = pymysql.connect(
            host="localhost", 
            user="root", 
            password="", 
            database="my_db" 
        )
        cur = conn.cursor()
        sql = 'SELECT * FROM user_info WHERE name ="{}"'.format(Name)
        cur.execute(sql)
        
        result = cur.fetchall()
        dispatcher.utter_message("Here is the information {}\n".format(result))

        conn.close()
        return []

class ActionSubmit(Action): 

    def name(self) -> Text: 
        #Unique identifier of the form
        return "action_submit"

    def run(self, dispatcher: CollectingDispatcher, 
            tracker: Tracker, 
            domain: Dict[Text, Any]) -> List[Dict[Text, Any]]: 
            
        Name = tracker.get_slot("name")
        Gender = tracker.get_slot("gender") 

        conn = pymysql.connect(
            host="localhost", 
            user="root", 
            password="", 
            database="my_db" 
        )
        cur = conn.cursor()
        sql='INSERT INTO user_info (name, gender) VALUES ("{}","{}","{}","{}");'.format(Name, Gender) 
        #sql='INSERT INTO user_info (name, gender, age, phonenumber) VALUES ("Ali","male","22","123");'
        cur.execute(sql) 
        conn.commit()
        # some other statements  with the help of cursor
        conn.close()
        print("Success!")
        dispatcher.utter_message("Thanks for the valuable feedback. ") 
        return []

class ActionForm(FormAction):

    def name(self) -> Text:
        return "user_form"

    @staticmethod
    def required_slots(tracker: Tracker) -> List[Text]:

        return["name","gender"]

    def slot_mappings(self) -> Dict[Text, Union[Dict, List[Dict]]]:
        # Pick up slot
        return {
        "name":[
            self.from_entity(entity="name"),
        ], 
        "gender":[
            self.from_entity(entity="gender"),
        ],
        }

    def submit(self, dispatcher: CollectingDispatcher, tracker: Tracker, domain: Dict[Text, Any],) -> List[Dict]:
        # utter submit template
        dispatcher.utter_message( template="utter_slots_value",)
        return []

class SomeAction(Action):
    def name(self):
        return "action_restart"

    def run(self, dispatcher, tracker, domain):
        # do something here

        return [Restarted()]