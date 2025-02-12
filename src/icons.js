/**
 *  ---------------------------- 
 *            IconatoR 
 *  ----------------------------
 *  Version : 12022025-1600
 *  Author  : Alain Kelleter
 *  Email   : alain@kelleter.be
 *  ----------------------------
 */

//  ----------------------------
//  Copy code to clipboard
//  ----------------------------
const copyCode = document.querySelectorAll(".copyCode");
const copied = document.querySelector("#copied"); 
const toCopy = document.querySelectorAll('.toCopy');
        
toCopy.forEach(function(element, index) {
    element.addEventListener("click", () => {
        const content = copyCode[index].textContent;
        navigator.clipboard.writeText(content).then(function() {
            copied.innerHTML = '<div class="alert alert-success">Icon code copied to clipboard</div>';
            setTimeout(() => {
                copied.innerHTML = "";
            }, 2000); 
        }).catch(function(err) {
            copied.innerHTML = '<div class="alert alert-danger">An error occurred while copying to the clipboard</div>';
            setTimeout(() => {
                copied.innerHTML = "";
            }, 2000); 
        });
    });
});

//  ------------------------------
//  Enable bootstrap tooltip
//  ------------------------------
const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))


