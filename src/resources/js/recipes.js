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

// function updateIngredientsCountInLine(parentGroup) {
//     const ingredientsCountInLine = parentGroup.querySelectorAll('.line').length;
//     parentGroup.querySelector('[name="ingredients_count_in_line[]"]').value = ingredientsCountInLine;
// }

// function updateInstructionsCountInLine(parentGroup) {
//     const instructionsCountInLine = parentGroup.querySelectorAll('.line').length;
//     parentGroup.querySelector('[name="instructions_count_in_line[]"]').value = instructionsCountInLine;
// }

// function cloneGroupDiv(topWrapper) {

//     const divGroups = topWrapper.querySelector('.groups-wrapper');
//     const divClonableGroup = divGroups.querySelector('.group').cloneNode(true);

//     cloneElement(divClonableGroup, divGroups);

//     const divWithGroupTopIdName = divGroups.querySelector('.group').closest('.section').id;
//     if (divWithGroupTopIdName == 'ingredients') {
//         updateIngredientsCountInLine(divGroups.lastChild);
//     } else if (divWithGroupTopIdName == 'instructions') {
//         updateInstructionsCountInLine(divGroups.lastChild);
//     }
// }

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


document.addEventListener('DOMContentLoaded', () => {

    const divRecipeCreate = document.querySelector('#recipeCreate');
    divRecipeCreate?.addEventListener('input', displayRemainingInputCharCount);

    const ingredientsTopWrapper = document.querySelector('#ingredients');
    ingredientsTopWrapper.addEventListener('click', handleGroupBtnActions);


    const instructionsTopWrapper = document.querySelector('#instructions');
    instructionsTopWrapper.addEventListener('click', handleGroupBtnActions);

});
