const prices = {
    mat: 450,
    pri: 500,
    eb: 550,
    sci_1: 650,
    sci_2: 650,
    sci_3: 650,
    sci_4: 750,
    tech_1: 700,
    tech_2: 700,
    tech_3: 700,
    tech_4: 800,
    com_1: 600,
    com_2: 600,
    com_3: 600,
    com_4: 650
};

const classSelect = document.getElementById('classSelector');
const periodSelect = document.getElementById('periodSelector');
const accompanteOption = document.getElementById('accompanteOption');
const totalOption = document.getElementById('totalOption');
const amountInput = document.getElementById('amountInput');

function updatePaymentDetails() {
    if (!classSelect) {
        return;
    }

    const classKey = classSelect.value;
    const period = accompanteOption?.checked ? 'trim' : 'annuel';
    const base = prices[classKey] || 0;
    const currentAmount = (period === 'annuel') ? base : (base / 3);
    const discount = (period === 'annuel') ? currentAmount * 0.05 : 0;
    const tax = (currentAmount - discount) * 0.02;
    const total = (currentAmount - discount) + tax;
    const promoLine = document.getElementById('promoLine');
    const promoVal = document.getElementById('promoVal');

    if (promoLine && promoVal) {
        promoLine.style.display = discount > 0 ? 'flex' : 'none';
        promoVal.innerText = "- " + discount.toFixed(2) + " $";
    }

    document.getElementById('baseVal').innerText = currentAmount.toFixed(2) + " $";
    document.getElementById('taxVal').innerText = tax.toFixed(2) + " $";
    document.getElementById('totalVal').innerText = total.toFixed(2) + " $";
    document.getElementById('btnAmount').innerText = total.toFixed(2);

    // Mettre à jour le récapitulatif du paiement
    const paymentTypeEl = document.getElementById('paymentType');
    const recapAmountEl = document.getElementById('recapAmount');
    
    if (paymentTypeEl) {
        paymentTypeEl.innerText = (period === 'annuel') ? 'Paiement complet (année scolaire)' : 'Acompte (1 trimestre)';
    }
    
    if (recapAmountEl) {
        recapAmountEl.innerText = total.toFixed(2) + " $";
    }

    // Mettre à jour les montants dans les cartes de type de paiement
    const acompteAmountEl = document.getElementById('acompteAmount');
    const totalAmountEl = document.getElementById('totalAmount');
    
    if (acompteAmountEl) {
        const accompantePrice = (base / 3) * 1.02;
        acompteAmountEl.innerText = accompantePrice.toFixed(2) + " $";
    }
    
    if (totalAmountEl) {
        const totalPrice = base * 0.95 * 1.02;
        totalAmountEl.innerText = totalPrice.toFixed(2) + " $";
    }

    if (amountInput) {
        amountInput.value = total.toFixed(2);
    }
}

if (classSelect) {
    classSelect.addEventListener('change', updatePaymentDetails);
}

if (accompanteOption) {
    accompanteOption.addEventListener('change', updatePaymentDetails);
}

if (totalOption) {
    totalOption.addEventListener('change', updatePaymentDetails);
}

window.addEventListener('load', updatePaymentDetails);
