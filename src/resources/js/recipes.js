function clearInputsInsideElement(element) {
    [...element.querySelectorAll('input, textarea')]?.forEach(input => {
        input.value = '';
    });

    [...element.querySelectorAll('small')]?.forEach(input => {
        input.textContent = '';
    });
}

function cloneGroupDiv(topWrapper) {

    const divGroups = topWrapper.querySelector('.groups-wrapper');
    const divClonableGroup = divGroups.querySelector('.group').cloneNode(true);

    cloneElement(divClonableGroup, divGroups);
}

function cloneElement(clonableEl, parentElement) {
    const clone = clonableEl.cloneNode(true);

    clearInputsInsideElement(clone);

    parentElement.appendChild(clone);
}

function handleGroupBtnActions (event) {
    const parentGroup = event.target.closest('.group');

    if (event.target.type == 'button' && event.target.dataset.btn == 'addLine') {

        const lineToClone = parentGroup.querySelector('.line');
        const insertInto = parentGroup.querySelector('.lines-in-group');

        cloneElement(lineToClone, insertInto);
    } else if (event.target.type == 'button' && event.target.dataset.btn == 'removeLine') {
        const allLinesInGroup = parentGroup.querySelectorAll('.line');

        // Prevent deleting last line
        if (allLinesInGroup.length == 1) {
            return;
        }

        event.target.parentElement.parentElement.remove();
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
    const btnAddIngredientGroup = ingredientsTopWrapper?.querySelector('[data-btn="addIngredientGroup"]');
    const divIngredientGroups = ingredientsTopWrapper?.querySelector('.groups-wrapper');

    btnAddIngredientGroup?.addEventListener('click', () => cloneGroupDiv(ingredientsTopWrapper));
    divIngredientGroups?.addEventListener('click', handleGroupBtnActions);


    const instructionsTopWrapper = document.querySelector('#instructions');
    const btnAddInstructionGroup = instructionsTopWrapper?.querySelector('[data-btn="addInstructionGroup"]');
    const divInstructionGroups = instructionsTopWrapper?.querySelector('.groups-wrapper');

    btnAddInstructionGroup?.addEventListener('click', () => cloneGroupDiv(instructionsTopWrapper));
    divInstructionGroups?.addEventListener('click', handleGroupBtnActions);

});
