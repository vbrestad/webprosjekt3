/*

Fetches all courses as a JSON string.

*/


document.getElementById("updateBtn").addEventListener("click", function(){
    document.getElementById("btnText").innerHTML = "Hello World";

});




//function update_courses() {
    //alert("clicked");

//}




/*

var xmlhttp = new XMLHttpRequest();
var url = "http://www.ime.ntnu.no/api/course/-";




function myFunction(obj) {
    var out = "";
    var i;

    //convert the string to an JSON object
    JSONObject jsono = new JSONObject(obj);

    //get the array inside the JSON object
    JSONArray jarray = jsono.getJSONArray("course");  //bruke denne linja for for å få samme exempel som w3schools? nei, fordi arrayen er ikke et object? jo det er det. men arrayen har et navn.
                                                    //det er forskjellen      jarray.length()

    //loop the array
    for (int i = 0; i < 10; i++;) {

        //temp storing of the object in the array at index i
        JSONObject object = jarray.getJSONObject(i);

        //for each object get the name
        var name = object.getString("name");

        //append all strings
        out += name + '<br>';

    }

    //need refresh? Eller skjer alt dette før siden er lagd ferdig/displayed?
    document.getElementById("content").innerHTML = out;

}




xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var myObj = JSON.parse(this.responseText);    //what do i get her? looks like a string. its not an array for me, its an obj as string
        myFunction(myObj);
    }
};
xmlhttp.open("GET", url, true);
xmlhttp.send();


*/
