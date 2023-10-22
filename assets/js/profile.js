 // JavaScript functions to show and hide the forms
    function showEditProfileForm() {
      document.querySelector('.profile-form').style.display = 'none';
      document.querySelector('.edit-profile-form').style.display = 'block';
    }

    function hideEditProfileForm() {
      document.querySelector('.profile-form').style.display = 'block';
      document.querySelector('.edit-profile-form').style.display = 'none';
    }