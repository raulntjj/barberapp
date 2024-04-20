const messages = [
    { condition: typeof unavailableDate !== 'undefined' && unavailableDate, message: "Data não disponível, tente outra." },
    { condition: typeof unavailableSchedule !== 'undefined' && unavailableSchedule, message: "Horário não disponível, tente outro." },
    { condition: typeof sucessfullyShedule !== 'undefined' && sucessfullyShedule, message: "Horário agendado, te aguardaremos ansiosamente." },
    { condition: typeof cpfExistError !== 'undefined' && cpfExistError, message: "CPF já está registrado. Por favor, tente novamente." },
    { condition: typeof cpfNotExistError !== 'undefined' && cpfNotExistError, message: "CPF não registrado. Por favor, Cadastre-se." },
    { condition: typeof wrongPass !== 'undefined' && wrongPass, message: "Senha incorreta. Por favor, tente novamente." },
    { condition: typeof userRegistred !== 'undefined' && userRegistred, message: "Usuário cadastrado com sucesso." },
];

messages.forEach(({ condition, message }) => {
    if (condition) {
        alert(message);
    }
});