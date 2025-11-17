// assets/script.js
document.addEventListener('DOMContentLoaded', function(){
  var payType = document.getElementById('payment_type');
  var cardBlock = document.getElementById('card-block');

  if (!payType) return;

  function toggleCard(){
    if (payType.value === 'Credit Card') {
      cardBlock.classList.remove('hidden');
    } else {
      cardBlock.classList.add('hidden');
    }
  }
  payType.addEventListener('change', toggleCard);
  toggleCard();
});
