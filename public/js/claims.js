let cashOptions = document.querySelectorAll(".cash_yn");

cashOptions.forEach(function (cashOption) {
    cashOption.addEventListener("change", function (e) {
        let section = document.getElementById(
            `bank-charges-section-${e.target.id}`
        );

        if (cashOption.value == "Yes") {
            section.classList.remove("d-none");
        } else {
            section.classList.add("d-none");
        }
    });
});
