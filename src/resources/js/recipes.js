function clearInputsInsideElement(element) {
    [...element.querySelectorAll('input, textarea')]?.forEach(input => {
        input.value = '';
    });

    [...element.querySelectorAll('small')]?.forEach(input => {
        input.textContent = '';
    });
}

function clearErrors(element) {
    const errorsDiv = element.querySelector('.errors');
    const errInputs = element.querySelectorAll('.is-invalid');

    if (errorsDiv) {
        errorsDiv.remove();
    }

    if (errInputs.length > 0) {
        [...errInputs].forEach(input => input.classList.remove('is-invalid'));
    }

    console.log(errInputs);
}

function cloneElement(clonableEl, parentElement) {
    const clone = clonableEl.cloneNode(true);

    clearInputsInsideElement(clone);
    clearErrors(clone);

    parentElement.appendChild(clone);
}

function handleGroupBtnActions (event) {
    const parentSection = event.target.closest('.section');
    const linesWrapper = parentSection.querySelector('.lines');

    if (event.target.type == 'button' && event.target.dataset.btn == 'addLine') {
        const lineToClone = linesWrapper.querySelector('.line');
        cloneElement(lineToClone, linesWrapper);
    } else if (event.target.type == 'button' && event.target.dataset.btn == 'removeLine') {
        const linesCount = linesWrapper.querySelectorAll('.line').length;
        if (linesCount == 1) {
            return;
        }

        event.target.closest('.line').remove();
    }

}

function displayRemainingInputCharCount (event) {
    const targetInput = event.target;
    const isCountable = targetInput.classList.contains('countable');
    const maxLength = targetInput.getAttribute('maxlength');

    if (isCountable && maxLength) {
        const charCountDisplayEl = event.target.parentElement.querySelector('span small');
        const currentLength = targetInput.value.length;
        charCountDisplayEl.textContent = maxLength - currentLength;
    }
}

function confirmDelete(event) {
    event.preventDefault();

    if (!confirm('Ar tikrai norite ištrinti?')) {
        return;
    }

    this.submit();
}


document.addEventListener('DOMContentLoaded', () => {

    const divRecipeCreate = document.querySelector('#recipeCreate');
    divRecipeCreate?.addEventListener('input', displayRemainingInputCharCount);

    const ingredientsTopWrapper = document.querySelector('#ingredients');
    ingredientsTopWrapper?.addEventListener('click', handleGroupBtnActions);


    const instructionsTopWrapper = document.querySelector('#instructions');
    instructionsTopWrapper?.addEventListener('click', handleGroupBtnActions);

    const deleteForm = document.querySelector('.delete-form');
    deleteForm?.addEventListener('submit', confirmDelete);


    const printBtn = document.querySelector('#printBtn');

    printBtn?.addEventListener('click', event => {
        const printableContent = document.querySelector('#printable').innerHTML;
        const originalContent = document.body.innerHTML;

        document.body.innerHTML = printableContent;
        window.print();
        document.body.innerHTML = originalContent;
    });
});
