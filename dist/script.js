let currentIndex = 0;
    const feedbackEntries = document.querySelectorAll('.carousel-content .feedback-entry');

    function showFeedback(index) {
        const transformValue = `translateX(${-index * 100}%)`;
        document.querySelector('.carousel-content').style.transform = transformValue;
    }

    function prevFeedback() {
        currentIndex = (currentIndex - 1 + feedbackEntries.length) % feedbackEntries.length;
        showFeedback(currentIndex);
    }

    function nextFeedback() {
        currentIndex = (currentIndex + 1) % feedbackEntries.length;
        showFeedback(currentIndex);
    }

    // Initial display
    showFeedback(currentIndex);
        
        function showElement(element) {
          var hiddenDiv = element.querySelector("#hiddenDiv");
          if (hiddenDiv) {
            hiddenDiv.classList.remove("hidden");
            hiddenDiv.classList.add("active");
          }
        }
  
        function hideElement(element) {
          var hiddenDiv = element.querySelector("#hiddenDiv");
          if (hiddenDiv) {
            hiddenDiv.classList.remove("active");
            hiddenDiv.addEventListener(
              "transitionend",
              function () {
                hiddenDiv.classList.add("hidden");
              },
              { once: true }
            );
          }
        }

        // move navbar to another page
        var categorySelect = document.getElementById('categorySelect');
        function redirectToPage() {
            var select = document.getElementById("categorySelect");
            var selectedOption = select.options[select.selectedIndex].value;
        
            // Redirect to the selected page based on the option value
            switch (selectedOption) {
                case "scholarship":
                    window.location.href = "scholarship.html";
                    break;
                case "fellowship":
                    window.location.href = "fellowship.html";
                    break;
                case "grants":
                    window.location.href = "grants.html";
                    break;
                // Add more cases for other options
                default:
                    // Handle the default case, maybe redirect to a default page or do nothing
                    break;
            }
        }
        

        var dropdownButton = document.getElementById('dropdownButton');
        var dropdownMenu = document.getElementById('dropdownMenu');
    
        // Toggle visibility of the dropdown menu
        dropdownButton.addEventListener('click', function() {
            dropdownMenu.classList.toggle('hidden');
        });
    
        // Close dropdown when clicking outside of it
        document.addEventListener('click', function(event) {
            var isClickInside = dropdownButton.contains(event.target) || dropdownMenu.contains(event.target);
            if (!isClickInside) {
                dropdownMenu.classList.add('hidden');
            }
        });