let availableCredit = parseFloat(
    document.getElementById("available-credit").value
);

let transferCredit = document.getElementById("transfer-credit");

let errorMessage = document.getElementById("error-message");

let disableSubmitBtn = false;

transferCredit.addEventListener("change", function () {
    if (parseFloat(transferCredit.value) > availableCredit) {
        disableSubmitBtn = true;
        errorMessage.classList.remove("d-none");
    } else {
        disableSubmitBtn = false;
        errorMessage.classList.add("d-none");
    }
    disableEnableSubmitBtn(disableSubmitBtn);
});

function disableEnableSubmitBtn(disableSubmitBtn) {
    const submitButton = document.getElementById("submit-btn");
    if (disableSubmitBtn) {
        submitButton.disabled = true;
    } else {
        submitButton.disabled = false;
    }
}
