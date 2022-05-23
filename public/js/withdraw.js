let maximumWithdrawalAmount = parseFloat(
    document.getElementById("maximum-request-amount").value
);

let requestAmount = document.getElementById("request-amount");

let errorMessage = document.getElementById("error-message");

let disableSubmitBtn = false;

requestAmount.addEventListener("change", function () {
    calculateBankCharges(requestAmount.value);

    if (parseFloat(requestAmount.value) > maximumWithdrawalAmount) {
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

function calculateBankCharges(requestAmount) {
    let bankChargePercentage = document.getElementById("bank-charges").value;

    let bankCharge = (requestAmount * bankChargePercentage) / 100;

    let payAmount = requestAmount - bankCharge;

    document.getElementById("payout-amount").value = payAmount;

    document.getElementById("payout-amount").value = payAmount;
}
