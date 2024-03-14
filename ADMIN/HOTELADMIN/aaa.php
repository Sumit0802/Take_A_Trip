<!DOCTYPE html>
<html>
<head>
  <title>Destination Page</title>
  <script>
    function populatePlaces() {
      var destination = document.getElementById("destination").value;
      var placeDropdown = document.getElementById("places");

      // Clear the existing options
      placeDropdown.innerHTML = "";

      // Populate the places based on the selected destination
      if (destination === "East") {
        var places = ["Arunachal Pradesh", "Sikkim", "Assam", "Nagaland", "Meghalaya", "West Bengal"];
      } else if (destination === "West") {
        var places = ["Mumbai", "Goa", "Gujarat", "Daman And Diu", "Dadra And Nagar Haveli", "Rajasthan"];
      } else if (destination === "North") {
        var places = ["Jammu And Kashmir", "Uttar Pradesh", "Uttrakhand", "Himachal Pradesh", "Punjab", "Delhi"];
      } else if (destination === "South") {
        var places = ["Telangana", "Andhra Pradesh", "Kerala", "Karnataka", "Tamil Nadu", "Andaman And Nicobar Islands"];
      } else if (destination === "Central") {
        var places = ["Madhya Pradesh", "Chattisgarh"];
      }

      // Add the places as options to the second dropdown
      for (var i = 0; i < places.length; i++) {
        var option = document.createElement("option");
        option.text = places[i];
        placeDropdown.add(option);
      }
    }
  </script>
</head>
<body>
  <h2>Select your destination:</h2>
  <select id="destination" onchange="populatePlaces()">
    <option value="">Select your destination</option>
    <option value="East">East</option>
    <option value="West">West</option>
    <option value="North">North</option>
    <option value="South">South</option>
    <option value="Central">Central</option>
  </select>

  <h2>Select a place:</h2>
  <select id="places"></select>
</body>
</html>
