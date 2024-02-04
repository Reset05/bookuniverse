function validateInput(input) {
    input.addEventListener('input', function() {
      if (!/^\d*$/.test(this.value)) {
        this.value = this.value.replace(/[^\d]/g, '');
      }
    });
}

const ratingInput = document.querySelectorAll('.rating-input')
ratingInput.forEach(validateInput)
