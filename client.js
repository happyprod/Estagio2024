// Adicione a sua chave pública do Stripe aqui
const stripe = Stripe('pk_test_51NKzOGCqYoZgfeJsbSLi9LZ52lmOKblb6crNuiQbKGJMWDxQL64OLDZzxfA454mHRf85UE7l9vcIauvHb5Uekg4f00tq2VkEXI');

document.getElementById('checkout-button1').addEventListener('click', async () => {
    const sessionResponse = await fetch('criar-sessao1.php', {
        method: 'POST',
    });

    const session = await sessionResponse.json();

    const result = await stripe.redirectToCheckout({
        sessionId: session.id,
    });

    if (result.error) {
        alert(result.error.message);
    }
});


document.getElementById('checkout-button2').addEventListener('click', async () => {
    const sessionResponse = await fetch('criar-sessao2.php', {
        method: 'POST',
    });

    const session = await sessionResponse.json();

    const result = await stripe.redirectToCheckout({
        sessionId: session.id,
    });

    if (result.error) {
        alert(result.error.message);
    }
});


document.getElementById('checkout-button3').addEventListener('click', async () => {
    const sessionResponse = await fetch('criar-sessao3.php', {
        method: 'POST',
    });

    const session = await sessionResponse.json();

    const result = await stripe.redirectToCheckout({
        sessionId: session.id,
    });

    if (result.error) {
        alert(result.error.message);
    }
});


