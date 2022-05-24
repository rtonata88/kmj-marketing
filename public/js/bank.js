selectedBank = document.getElementById('bank');

function populateBranches(selectedbank){
    const bankInfo = await getBankBranch(selectedbank.value);

    let branch
}


async function getBankBranch(bankId) {
    let token = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");

    const response = await fetch(`/bank-info/${bankId}`, {
        headers: {
            "Content-Type": "application/json",
            Accept: "application/json, text-plain, */*",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-TOKEN": token,
        },
        credentials: "same-origin",
    })
        .then(function (data) {
            return data.json();
        })
        .catch(function (error) {
            console.log(error);
        });

    return response;
}