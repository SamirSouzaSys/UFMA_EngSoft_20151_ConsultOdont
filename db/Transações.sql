Transações

insert funcionario
	
insert secretário
INSERT INTO `consultOdontEngSoft`.`secretario`
(`id`,`nome`,`cpf`,`dataNascimento`,
`endereco`,`contato`,`matricula`,`senha`,
`secretariocol`)
VALUES
(<{id: }>,<{nome: }>,<{cpf: }>,<{dataNascimento: }>,<{endereco: }>,<{contato: }>,<{matricula: }>,<{senha: }>,<{secretariocol: }>);

insert cliente
INSERT INTO `consultOdontEngSoft`.`cliente`
(`id`,
`nome`,
`cpf`,
`dataNascimento`,
`endereco`,
`contato`)
VALUES
(<{id: }>,
<{nome: }>,
<{cpf: }>,
<{dataNascimento: }>,
<{endereco: }>,
<{contato: }>);


insert cirurgião
INSERT INTO `consultOdontEngSoft`.`cirurgiao`
(`id`,
`nome`,
`cpf`,
`dataNascimento`,
`endereco`,
`contato`,
`matricula`,
`senha`,
`secretariocol`,
`cro`)
VALUES
(<{id: }>,
<{nome: }>,
<{cpf: }>,
<{dataNascimento: }>,
<{endereco: }>,
<{contato: }>,
<{matricula: }>,
<{senha: }>,
<{secretariocol: }>,
<{cro: }>);


insert procedimento

insert listaDeEspera
insert planoTratamentoProcedimentos
insert planoTratProced_Proced
insert atendimento