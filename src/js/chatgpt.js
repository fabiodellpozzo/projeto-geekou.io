const formPerguntaChat = document.getElementById('form-pergunta-chat');
const OPENAI_API_KEY = "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";
if(OPENAI_API_KEY === ""){
    document.getElementById('pergunta').innerHTML = "<span style='color: #f00;'>Necessário colocar a chave na API no arquivo custom.js</span>";
}
if (formPerguntaChat) {
    formPerguntaChat.addEventListener("submit", async (e) => {
        e.preventDefault();
        document.getElementById('btn-pergunta-chat').value = "Pesquisando...";
        let pergunta = document.getElementById('campo-pergunta').value;
        document.getElementById('pergunta').innerHTML = pergunta;
        document.getElementById('resposta').innerHTML = "<span></span>";
        await fetch("https://api.openai.com/v1/completions", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
                Authorization: "Bearer " + OPENAI_API_KEY,
            },
            body: JSON.stringify({
                model: "text-davinci-003",
                prompt: pergunta,
                max_tokens: 2048,
                temperature: 0.7
            }),
        })
            .then((resposta) => resposta.json())
            .then((dados) => {
                document.getElementById('resposta').innerHTML = dados.choices[0].text;
            })
            .catch(() => {
                document.getElementById('resposta').innerHTML = "Sem resposta";
            });
        document.getElementById('btn-pergunta-chat').value = "Enviar";
    });
}