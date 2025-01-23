document.addEventListener("DOMContentLoaded", () => {
  const steps = document.querySelectorAll(".form-step"); 
  const navigationButtons = document.querySelectorAll(".button[data-step]"); 
  const navItems = document.querySelectorAll('.nav-item'); 

  let currentStepIndex = 0; 

  function updateSteps() {
 
    steps.forEach((step, index) => {
      if (index === currentStepIndex) {
        step.classList.add("active");
        step.style.display = "block";
      } else {
        step.classList.remove("active");
        step.style.display = "none"; 
      }
    });

    navItems.forEach(item => {
      const stepName = item.getAttribute('data-step');
      if (stepName === steps[currentStepIndex].id.replace('container_', '')) {
        item.classList.add('active'); 
      } else {
        item.classList.remove('active');
      }
    });
  }


  navItems.forEach(item => {
    item.addEventListener('click', (e) => {
      const stepName = e.target.closest('.nav-item').getAttribute('data-step');

      currentStepIndex = Array.from(steps).findIndex(step => step.id === `container_${stepName}`);
      updateSteps(); 
    });
  });

  navigationButtons.forEach(button => {
    button.addEventListener("click", () => {
      const stepChange = parseInt(button.getAttribute("data-step"), 10);
      const newStepIndex = currentStepIndex + stepChange;

      
      if (newStepIndex >= 0 && newStepIndex < steps.length) {
        currentStepIndex = newStepIndex; 
        updateSteps();
      }
    });
  });

  updateSteps();
});
