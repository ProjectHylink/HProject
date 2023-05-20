document.addEventListener("DOMContentLoaded", function() {
    var dashboardLink = document.getElementById("dashboard-link");
    var profileLink = document.getElementById("profile-link");
    var dashboardContent = document.getElementById("dashboard-content");
    var profileContent = document.getElementById("profile-content");

    dashboardLink.addEventListener("click", function() {
      dashboardContent.style.display = "block";
      profileContent.style.display = "none";
    });

    profileLink.addEventListener("click", function() {
      dashboardContent.style.display = "none";
      profileContent.style.display = "block";
    });
  });


  function shiftContent() {
    var content = document.getElementById("content-container");
    content.style.marginLeft = "0";
  }

  function shiftContent2() {
    var content = document.getElementById("content-container");
    content.style.marginLeft = "250px";
  }

  function removeContent() {
    var content222 = document.getElementById("content222");
    content222.remove();
  }