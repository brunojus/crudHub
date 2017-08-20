<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;

	class AdminPatientsController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "id";
			$this->limit = "20";
			$this->orderby = "id,desc";
			$this->global_privilege = false;
			$this->button_table_action = true;
			$this->button_bulk_action = true;
			$this->button_action_style = "button_icon";
			$this->button_add = true;
			$this->button_edit = true;
			$this->button_delete = true;
			$this->button_detail = true;
			$this->button_show = true;
			$this->button_filter = true;
			$this->button_import = true;
			$this->button_export = true;
			$this->table = "patients";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"identificação","name"=>"idPatient"];
			$this->col[] = ["label"=>"Cor da Pele Declarada","name"=>"Pele"];
			$this->col[] = ["label"=>"Ocupação","name"=>"Ocupacao"];
			$this->col[] = ["label"=>"Renda Familiar","name"=>"Renda"];
			$this->col[] = ["label"=>"Estado Civil","name"=>"EstadoCivil"];
			$this->col[] = ["label"=>"Escolaridade","name"=>"Escolaridade"];
			$this->col[] = ["label"=>"Tratamento para o pé Diabético","name"=>"TipoTratamento"];
			$this->col[] = ["label"=>"Utiliza dispositivo de auxílio para pé diabético","name"=>"AjudaMarcha"];
			$this->col[] = ["label"=>"Se Sim, tem ajuda marcha","name"=>"SimAjudaMarcha"];
			$this->col[] = ["label"=>"Sus","name"=>"Sus"];
			$this->col[] = ["label"=>"Convênio","name"=>"Convênio"];
			$this->col[] = ["label"=>"Tempo de Diagnóstico","name"=>"TempoDiagnóstico"];
			$this->col[] = ["label"=>"Diabetes","name"=>"TipoDiabetes"];
			$this->col[] = ["label"=>"Frequência de automonitorização glicêmica","name"=>"VerificaGlicemia"];
			$this->col[] = ["label"=>"Tratamento Insulinoterápico","name"=>"TratamentoInsulina"];
			$this->col[] = ["label"=>"Medicamentos para diabetes","name"=>"MedicamentoDiabetes"];
			$this->col[] = ["label"=>"PA","name"=>"PA"];
			$this->col[] = ["label"=>"Glicemia Capilar","name"=>"GlicemiaCapilar"];
			$this->col[] = ["label"=>"Peso","name"=>"Peso"];
			$this->col[] = ["label"=>"Altura","name"=>"Altura"];
			$this->col[] = ["label"=>"IMC","name"=>"IMC"];
			$this->col[] = ["label"=>"Doenças Associadas","name"=>"DoençasAssociadas"];
			$this->col[] = ["label"=>"Valor Hemoglobina Glicada","name"=>"Hemoglobina"];
			$this->col[] = ["label"=>"Você sente com maior frequência?","name"=>"SenteMaiorFrequencia"];
			$this->col[] = ["label"=>"O local do sintoma mais frequente é?","name"=>"LocalDor"];
			$this->col[] = ["label"=>"O sintoma?","name"=>"Sintoma"];
			$this->col[] = ["label"=>"Já acordou pelo sintoma?","name"=>"AcordouSintoma"];
			$this->col[] = ["label"=>"O que alivia o sintoma?","name"=>"AliviaSintoma"];
			$this->col[] = ["label"=>"Quando realiza exercício físico sente melhora dos sintomas?","name"=>"ExercicioMelhora"];
			$this->col[] = ["label"=>"Escala Visual Analógica","name"=>"EscalaVisualAnalogica"];
			$this->col[] = ["label"=>"Vasos Dilatados Dorsais","name"=>"VDD"];
			$this->col[] = ["label"=>"Pele seca, rachaduras, fissuras","name"=>"PSRF"];
			$this->col[] = ["label"=>"Cor da Pele Normal","name"=>"CPN"];
			$this->col[] = ["label"=>"Micose Interdigital","name"=>"MI"];
			$this->col[] = ["label"=>"Micose ungueal","name"=>"MU"];
			$this->col[] = ["label"=>"Pelos Presentes","name"=>"PP"];
			$this->col[] = ["label"=>"Calosidades","name"=>"Calosidades"];
			$this->col[] = ["label"=>"Edema","name"=>"Edema"];
			$this->col[] = ["label"=>"Calçados Adequados","name"=>"CalcadosAdequados"];
			$this->col[] = ["label"=>"Sinal de Cacifo","name"=>"SinalDeCacifo"];
			$this->col[] = ["label"=>"Perimetria Local","name"=>"PerimetriaLocal"];
			$this->col[] = ["label"=>"Perimetria Lado Direito","name"=>"PerimetriaDireito"];
			$this->col[] = ["label"=>"Perimetria Lado Esquedo","name"=>"PerimetriaEsquerdo"];
			$this->col[] = ["label"=>"Pé neuropático típico","name"=>"PeNeuropaticoTipico"];
			$this->col[] = ["label"=>"Arco desabado","name"=>"ArcoDesabado"];
			$this->col[] = ["label"=>"Valgismo","name"=>"Valgismo"];
			$this->col[] = ["label"=>"Dedos em garra","name"=>"DedosEmGarra"];
			$this->col[] = ["label"=>"Sinal da Prece","name"=>"SinalDaPrece"];
			$this->col[] = ["label"=>"PSP Ponto 1 Direito","name"=>"SensibilidadeProtetoraP1D"];
			$this->col[] = ["label"=>"PSP Ponto 2 Direito","name"=>"SensibilidadeProtetoraP2D"];
			$this->col[] = ["label"=>"PSP Ponto 3 Direito","name"=>"SensibilidadeProtetoraP3D"];
			$this->col[] = ["label"=>"PSP Ponto 4 Direito","name"=>"SensibilidadeProtetoraP4D"];
			$this->col[] = ["label"=>"PSP Ponto 5 Direito","name"=>"SensibilidadeProtetoraP5D"];
			$this->col[] = ["label"=>"PSP Ponto 1 Esquerdo","name"=>"SensibilidadeProtetoraP1E"];
			$this->col[] = ["label"=>"PSP Ponto 2 Esquerdo","name"=>"SensibilidadeProtetoraP2E"];
			$this->col[] = ["label"=>"PSP Ponto 3 Esquerdo","name"=>"SensibilidadeProtetoraP3E"];
			$this->col[] = ["label"=>"PSP Ponto 4 Esquerdo","name"=>"SensibilidadeProtetoraP4E"];
			$this->col[] = ["label"=>"PSP Ponto 5 Esquerdo","name"=>"SensibilidadeProtetoraP5E"];
			$this->col[] = ["label"=>"Sensibilidade vibratório diminuída ou ausente","name"=>"SVDA"];
			$this->col[] = ["label"=>"Sensibilidade dolorosa diminuída ou ausente","name"=>"SDDA"];
			$this->col[] = ["label"=>"Sensibilidade ao frio diminuída ou ausente","name"=>"SFDA"];
			$this->col[] = ["label"=>"Reflexos aquileus diminuídos ou ausentes","name"=>"RADA"];
			$this->col[] = ["label"=>"PSP","name"=>"PSP"];
			$this->col[] = ["label"=>"Estesiometria Eletrônica Dir1","name"=>"EEDIR1"];
			$this->col[] = ["label"=>"Estesiometria Eletrônica Dir2","name"=>"EEDIR2"];
			$this->col[] = ["label"=>"Estesiometria Eletrônica Dir3","name"=>"EEDIR3"];
			$this->col[] = ["label"=>"Estesiometria Eletrônica Dir4","name"=>"EEDIR4"];
			$this->col[] = ["label"=>"Estesiometria Eletrônica Dir5","name"=>"EEDIR5"];
			$this->col[] = ["label"=>"Estesiometria Eletrônica ESQ1","name"=>"EEE1"];
			$this->col[] = ["label"=>"Estesiometria Eletrônica ESQ2","name"=>"EEE2"];
			$this->col[] = ["label"=>"Estesiometria Eletrônica ESQ3","name"=>"EEE3"];
			$this->col[] = ["label"=>"Estesiometria Eletrônica ESQ4","name"=>"EEE4"];
			$this->col[] = ["label"=>"Estesiometria Eletrônica ESQ5","name"=>"EEE5"];
			$this->col[] = ["label"=>"Pé direito Pulso arterial pedioso","name"=>"PDPAP"];
			$this->col[] = ["label"=>"Pé direito Pulso arterial tibial posterior","name"=>"PATP"];
			$this->col[] = ["label"=>"Pé esquerdo pulso arterial pedioso","name"=>"PEPAP"];
			$this->col[] = ["label"=>"Pé direito Pulso arterial tibial posterior","name"=>"PEPATP"];
			$this->col[] = ["label"=>"Amputação","name"=>"Amputacao"];
			$this->col[] = ["label"=>"Úlcera Pŕevia","name"=>"UlceraPrevia"];
			$this->col[] = ["label"=>"Úlcera Ativa","name"=>"UlceraAtiva"];
			$this->col[] = ["label"=>"Classificação do Risco","name"=>"ClassificacaoRisco"];
			$this->col[] = ["label"=>"Teste Muscular Manual Sóleo e Gastrocnêmio D","name"=>"TMMSGD"];
			$this->col[] = ["label"=>"Teste Muscular Manual Sóleo e Gastrocnêmio E","name"=>"TMMSGE"];
			$this->col[] = ["label"=>"Teste Muscular Manual Tibial Anterior D","name"=>"TMMTAD"];
			$this->col[] = ["label"=>"Teste Muscular Manual Tibial Anterior E","name"=>"TMMTAE"];
			$this->col[] = ["label"=>"Escala de Equilibrio de Berg","name"=>"EscalaBerg"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'identificação','name'=>'idPatient','type'=>'text','width'=>'col-sm-10','style'=>'AAA00000000'];
			$this->form[] = ['label'=>'Cor da pele declarada','name'=>'Pele','type'=>'radio','width'=>'col-sm-10','dataenum'=>'Branca;Preta;Mulata;Amarela;Outra'];
			$this->form[] = ['label'=>'Ocupação','name'=>'Ocupacao','type'=>'radio','width'=>'col-sm-10','dataenum'=>'Desempregada;Empregada;Aposentada'];
			$this->form[] = ['label'=>'Renda familiar','name'=>'Renda','type'=>'radio','width'=>'col-sm-10','dataenum'=>'1 a 2 Salários mínimos;3 a 4 Salários mínimos; Mais que 2 Salários mínimos'];
			$this->form[] = ['label'=>'Estado Civil','name'=>'EstadoCivil','type'=>'radio','width'=>'col-sm-10','dataenum'=>'Solteira;Casada;Divorcidada;Viúva'];
			$this->form[] = ['label'=>'Escolaridade','name'=>'Escolaridade','type'=>'radio','width'=>'col-sm-10','dataenum'=>'Analfabeta;Primeiro grau completo ou incompleto; Segundo grau completo ou incompleto; Superior completo ou incompleto'];
			$this->form[] = ['label'=>'Tratamento para pé diabético','name'=>'TipoTratamento','type'=>'radio','width'=>'col-sm-10','dataenum'=>'Nunca realizado;Realiza/Realizou tratamento medicamentoso;Realiza/Realizou tratamento cirúrgico;Realiza/realizou tratamento fisioterapêutico'];
			$this->form[] = ['label'=>'AjudaMarcha','name'=>'AjudaMarcha','type'=>'radio','width'=>'col-sm-10','dataenum'=>'sim;não'];
			$this->form[] = ['label'=>'Se houver ajuda na marcha','name'=>'SimAjudaMarcha','type'=>'text','width'=>'col-sm-9'];
			$this->form[] = ['label'=>'Sus','name'=>'Sus','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Convênio','name'=>'Convênio','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Tempo de Diagnóstico','name'=>'TempoDiagnóstico','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Diabetes','name'=>'TipoDiabetes','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Frequência da automonitorização glicêmica','name'=>'VerificaGlicemia','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Tratamento Insulinoterápico','name'=>'TratamentoInsulina','type'=>'radio','width'=>'col-sm-10','dataenum'=>'sim;não'];
			$this->form[] = ['label'=>'Medicamento para Diabetes','name'=>'MedicamentoDiabetes','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'PA','name'=>'PA','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Glicemia Capilar','name'=>'GlicemiaCapilar','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Peso','name'=>'Peso','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Altura','name'=>'Altura','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'IMC','name'=>'IMC','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Doenças Associadas','name'=>'DoençasAssociadas','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Valor da Hemoglobina Glicada','name'=>'Hemoglobina','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Você sente com maior frequêcia','name'=>'SenteMaiorFrequencia','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'Queimação, dormência ou formigamento;Fadiga, cãimbras ou dor;Assintomático'];
			$this->form[] = ['label'=>'O local do sintoma mais frequento é','name'=>'LocalDor','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'Nos pés;Pernas;Outro Local'];
			$this->form[] = ['label'=>'O Sintoma','name'=>'Sintoma','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'Surge ou piora à noite;Surge durante o dia e à noite;Apenas durante o dia'];
			$this->form[] = ['label'=>'Já acordou pelo sintoma','name'=>'AcordouSintoma','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'Sim;Não'];
			$this->form[] = ['label'=>'O que alivia o sintoma','name'=>'AliviaSintoma','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'Ao caminhar;Ao se levantar;Ao se deitar/repousar;Outra condição/situação'];
			$this->form[] = ['label'=>'Exercício alivia sintomas?','name'=>'ExercicioMelhora','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'Sim;Não'];
			$this->form[] = ['label'=>'Mensuração','name'=>'EscalaVisualAnalogica','type'=>'radio','width'=>'col-sm-10','dataenum'=>'Leve<40mm;Moderada >= 40-69mm;Grave >= 70mm'];
			$this->form[] = ['label'=>'Vasos Dilatados Dorsais','name'=>'VDD','type'=>'radio','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Pele seca, rachaduras, fissuras','name'=>'PSRF','type'=>'radio','width'=>'col-sm-10','dataenum'=>'Sim;Não'];
			$this->form[] = ['label'=>'Cor da Pele normal','name'=>'CPN','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'Sim;Não'];
			$this->form[] = ['label'=>'Micose Interdigital','name'=>'MI','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'Sim;Não'];
			$this->form[] = ['label'=>'Micose Ungueal','name'=>'MU','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'Sim;Não'];
			$this->form[] = ['label'=>'Pêlos Presentes','name'=>'PP','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'Sim;Não'];
			$this->form[] = ['label'=>'Calosidades','name'=>'Calosidades','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'Sim;Não'];
			$this->form[] = ['label'=>'Edema','name'=>'Edema','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'Sim;Não'];
			$this->form[] = ['label'=>'Calcados Adequados','name'=>'CalcadosAdequados','type'=>'radio','width'=>'col-sm-10','dataenum'=>'Sim;Não'];
			$this->form[] = ['label'=>'Sinal De Cacifo','name'=>'SinalDeCacifo','type'=>'radio','width'=>'col-sm-10','dataenum'=>'Sim;Não'];
			$this->form[] = ['label'=>'Perimetria Local','name'=>'PerimetriaLocal','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Perimetria Pé Direito','name'=>'PerimetriaDireito','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Perimetria Pé Esquerdo','name'=>'PerimetriaEsquerdo','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Pé Neuropático Típico','name'=>'PeNeuropaticoTipico','type'=>'radio','width'=>'col-sm-10','dataenum'=>'Sim;Não'];
			$this->form[] = ['label'=>'Arco Desabado','name'=>'ArcoDesabado','type'=>'radio','width'=>'col-sm-10','dataenum'=>'Sim;Não'];
			$this->form[] = ['label'=>'Valgismo','name'=>'Valgismo','type'=>'radio','width'=>'col-sm-10','dataenum'=>'Sim;Não'];
			$this->form[] = ['label'=>'Dedos Em Garra','name'=>'DedosEmGarra','type'=>'radio','width'=>'col-sm-10','dataenum'=>'Sim;Não'];
			$this->form[] = ['label'=>'Sinal Da Prece','name'=>'SinalDaPrece','type'=>'radio','width'=>'col-sm-10','dataenum'=>'Sim;Não'];
			$this->form[] = ['label'=>'Sensibilidade Protetora Ponto 1 Direito','name'=>'SensibilidadeProtetoraP1D','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Sensibilidade Protetora Ponto 2 Direito','name'=>'SensibilidadeProtetoraP2D','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Sensibilidade Protetora Ponto 3 Direito','name'=>'SensibilidadeProtetoraP3D','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Sensibilidade Protetora Ponto 4 Direito','name'=>'SensibilidadeProtetoraP4D','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Sensibilidade Protetora Ponto 5 Direito','name'=>'SensibilidadeProtetoraP5D','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Sensibilidade Protetora Ponto 1 Esquerdo','name'=>'SensibilidadeProtetoraP1E','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Sensibilidade Protetora Ponto 2 Esquerdo','name'=>'SensibilidadeProtetoraP2E','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Sensibilidade Protetora Ponto 3 Esquerdo','name'=>'SensibilidadeProtetoraP3E','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Sensibilidade Protetora Ponto 4 Esquerdo','name'=>'SensibilidadeProtetoraP4E','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Sensibilidade Protetora Ponto 5 Esquerdo','name'=>'SensibilidadeProtetoraP5E','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Monofilamento Alterado','name'=>'MonofilamentoAlterado','type'=>'radio','width'=>'col-sm-10','dataenum'=>'Sim;Não'];
			$this->form[] = ['label'=>'Sensibilidade vibratório diminuída ou ausente','name'=>'SVDA','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'D;E'];
			$this->form[] = ['label'=>'STDA','name'=>'STDA','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'D;E'];
			$this->form[] = ['label'=>'Sensibilidade dolorosa diminuída ou ausente','name'=>'SDDA','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'D;E'];
			$this->form[] = ['label'=>'Sensibilidade ao frio diminuída ou ausente','name'=>'SFDA','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'D;E'];
			$this->form[] = ['label'=>'Reflexos aquileus diminuídos ou ausentes','name'=>'RADA','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'D;E'];
			$this->form[] = ['label'=>'PSP','name'=>'PSP','type'=>'radio','width'=>'col-sm-10','dataenum'=>'Sim;Não'];
			$this->form[] = ['label'=>'Estesiometria Eletrônica DIR 1','name'=>'EEDIR1','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Estesiometria Eletrônica DIR 2','name'=>'EEDIR2','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Estesiometria Eletrônica DIR 3','name'=>'EEDIR3','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Estesiometria Eletrônica DIR 4','name'=>'EEDIR4','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Estesiometria Eletrônica DIR 5','name'=>'EEDIR5','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Estesiometria Eletrônica ESQ 1','name'=>'EEE1','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Estesiometria Eletrônica ESQ 2','name'=>'EEE2','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Estesiometria Eletrônica ESQ 3','name'=>'EEE3','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Estesiometria Eletrônica ESQ 4','name'=>'EEE4','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Estesiometria Eletrônica ESQ 5','name'=>'EEE5','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Pé direito pulso arterial pedioso','name'=>'PDPAP','type'=>'radio','width'=>'col-sm-10','dataenum'=>'Presente;Diminuído ou Ausente'];
			$this->form[] = ['label'=>'Pé direito pulso arterial tibial posterior','name'=>'PATP','type'=>'radio','width'=>'col-sm-10','dataenum'=>'Presente;Diminuído ou Ausente'];
			$this->form[] = ['label'=>'Pé Esquerdo pulso arterial pedioso','name'=>'PEPAP','type'=>'radio','width'=>'col-sm-10','dataenum'=>'Presente;Diminuído ou Ausente'];
			$this->form[] = ['label'=>'Pé Esquerdo pulso arterial tibial posterior','name'=>'PEPATP','type'=>'radio','width'=>'col-sm-10','dataenum'=>'Presente;Diminuído ou Ausente'];
			$this->form[] = ['label'=>'Amputação','name'=>'Amputacao','type'=>'radio','width'=>'col-sm-10','dataenum'=>'Presente;Diminuído ou Ausente'];
			$this->form[] = ['label'=>'Ulcera Prévia','name'=>'UlceraPrevia','type'=>'radio','width'=>'col-sm-10','dataenum'=>'Sim;Não'];
			$this->form[] = ['label'=>'Ulcera Ativa','name'=>'UlceraAtiva','type'=>'radio','width'=>'col-sm-10','dataenum'=>'Presente;Diminuído ou Ausente'];
			$this->form[] = ['label'=>'Classificação do Risco e Seguimento','name'=>'ClassificacaoRisco','type'=>'select','width'=>'col-sm-10','dataenum'=>'0;1;2;3'];
			$this->form[] = ['label'=>'Teste Muscular Manual Sóleo e Gastrocnêmio D','name'=>'TMMSGD','type'=>'select','width'=>'col-sm-10','dataenum'=>'Grau 0;Grau 1;Grau 2;Grau 3;Grau 4;Grau 5'];
			$this->form[] = ['label'=>'Teste Muscular Manual Sóleo e Gastrocnêmio E','name'=>'TMMSGE','type'=>'select','width'=>'col-sm-10','dataenum'=>'Grau 0;Grau 1;Grau 2;Grau 3;Grau 4;Grau 5'];
			$this->form[] = ['label'=>'Teste Muscular Manual Tibial Anterior D','name'=>'TMMTAD','type'=>'select','width'=>'col-sm-10','dataenum'=>'Grau 0;Grau 1;Grau 2;Grau 3;Grau 4;Grau 5'];
			$this->form[] = ['label'=>'Teste Muscular Manual Tibial Anterior E','name'=>'TMMTAE','type'=>'select','width'=>'col-sm-10','dataenum'=>'Grau 0;Grau 1;Grau 2;Grau 3;Grau 4;Grau 5'];
			$this->form[] = ['label'=>'Escala de Equilíbrio de Berg','name'=>'EscalaBerg','type'=>'text','width'=>'col-sm-10'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ['label'=>'identificação','name'=>'idPatient','type'=>'text','width'=>'col-sm-10','style'=>'AAA00000000'];
			//$this->form[] = ['label'=>'Cor da pele declarada','name'=>'Pele','type'=>'radio','width'=>'col-sm-10','dataenum'=>'Branca;Preta;Mulata;Amarela;Outra'];
			//$this->form[] = ['label'=>'Ocupação','name'=>'Ocupacao','type'=>'radio','width'=>'col-sm-10','dataenum'=>'Desempregada;Empregada;Aposentada'];
			//$this->form[] = ['label'=>'Renda familiar','name'=>'Renda','type'=>'radio','width'=>'col-sm-10','dataenum'=>'1 a 2 Salários mínimos;3 a 4 Salários mínimos; Mais que 2 Salários mínimos'];
			//$this->form[] = ['label'=>'Estado Civil','name'=>'EstadoCivil','type'=>'radio','width'=>'col-sm-10','dataenum'=>'Solteira;Casada;Divorcidada;Viúva'];
			//$this->form[] = ['label'=>'Escolaridade','name'=>'Escolaridade','type'=>'radio','width'=>'col-sm-10','dataenum'=>'Analfabeta;Primeiro grau completo ou incompleto; Segundo grau completo ou incompleto; Superior completo ou incompleto'];
			//$this->form[] = ['label'=>'Tratamento para pé diabético','name'=>'TipoTratamento','type'=>'radio','width'=>'col-sm-10','dataenum'=>'Nunca realizado;Realiza/Realizou tratamento medicamentoso;Realiza/Realizou tratamento cirúrgico;Realiza/realizou tratamento fisioterapêutico'];
			//$this->form[] = ['label'=>'AjudaMarcha','name'=>'AjudaMarcha','type'=>'radio','width'=>'col-sm-10','dataenum'=>'sim;não'];
			//$this->form[] = ['label'=>'Se houver ajuda na marcha','name'=>'SimAjudaMarcha','type'=>'text','width'=>'col-sm-9'];
			//$this->form[] = ['label'=>'Sus','name'=>'Sus','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Convênio','name'=>'Convênio','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Tempo de Diagnóstico','name'=>'TempoDiagnóstico','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Diabetes','name'=>'TipoDiabetes','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Frequência da automonitorização glicêmica','name'=>'VerificaGlicemia','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Tratamento Insulinoterápico','name'=>'TratamentoInsulina','type'=>'radio','width'=>'col-sm-10','dataenum'=>'sim;não'];
			//$this->form[] = ['label'=>'Medicamento para Diabetes','name'=>'MedicamentoDiabetes','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'PA','name'=>'PA','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Glicemia Capilar','name'=>'GlicemiaCapilar','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Peso','name'=>'Peso','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Altura','name'=>'Altura','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'IMC','name'=>'IMC','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Doenças Associadas','name'=>'DoençasAssociadas','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Valor da Hemoglobina Glicada','name'=>'Hemoglobina','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Você sente com maior frequêcia','name'=>'SenteMaiorFrequencia','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'Queimação, dormência ou formigamento;Fadiga, cãimbras ou dor;Assintomático'];
			//$this->form[] = ['label'=>'O local do sintoma mais frequento é','name'=>'LocalDor','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'Nos pés;Pernas;Outro Local'];
			//$this->form[] = ['label'=>'O Sintoma','name'=>'Sintoma','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'Surge ou piora à noite;Surge durante o dia e à noite;Apenas durante o dia'];
			//$this->form[] = ['label'=>'Já acordou pelo sintoma','name'=>'AcordouSintoma','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'Sim;Não'];
			//$this->form[] = ['label'=>'O que alivia o sintoma','name'=>'AliviaSintoma','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'Ao caminhar;Ao se levantar;Ao se deitar/repousar;Outra condição/situação'];
			//$this->form[] = ['label'=>'Exercício alivia sintomas?','name'=>'ExercicioMelhora','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'Sim;Não'];
			//$this->form[] = ['label'=>'Mensuração','name'=>'EscalaVisualAnalogica','type'=>'radio','width'=>'col-sm-10','dataenum'=>'Leve<40mm;Moderada >= 40-69mm;Grave >= 70mm'];
			//$this->form[] = ['label'=>'Vasos Dilatados Dorsais','name'=>'VDD','type'=>'radio','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Pele seca, rachaduras, fissuras','name'=>'PSRF','type'=>'radio','width'=>'col-sm-10','dataenum'=>'Sim;Não'];
			//$this->form[] = ['label'=>'Cor da Pele normal','name'=>'CPN','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'Sim;Não'];
			//$this->form[] = ['label'=>'Micose Interdigital','name'=>'MI','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'Sim;Não'];
			//$this->form[] = ['label'=>'Micose Ungueal','name'=>'MU','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'Sim;Não'];
			//$this->form[] = ['label'=>'Pêlos Presentes','name'=>'PP','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'Sim;Não'];
			//$this->form[] = ['label'=>'Calosidades','name'=>'Calosidades','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'Sim;Não'];
			//$this->form[] = ['label'=>'Edema','name'=>'Edema','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'Sim;Não'];
			//$this->form[] = ['label'=>'Calcados Adequados','name'=>'CalcadosAdequados','type'=>'radio','width'=>'col-sm-10','dataenum'=>'Sim;Não'];
			//$this->form[] = ['label'=>'Sinal De Cacifo','name'=>'SinalDeCacifo','type'=>'radio','width'=>'col-sm-10','dataenum'=>'Sim;Não'];
			//$this->form[] = ['label'=>'Perimetria Local','name'=>'PerimetriaLocal','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Perimetria Pé Direito','name'=>'PerimetriaDireito','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Perimetria Pé Esquerdo','name'=>'PerimetriaEsquerdo','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Pé Neuropático Típico','name'=>'PeNeuropaticoTipico','type'=>'radio','width'=>'col-sm-10','dataenum'=>'Sim;Não'];
			//$this->form[] = ['label'=>'Arco Desabado','name'=>'ArcoDesabado','type'=>'radio','width'=>'col-sm-10','dataenum'=>'Sim;Não'];
			//$this->form[] = ['label'=>'Valgismo','name'=>'Valgismo','type'=>'radio','width'=>'col-sm-10','dataenum'=>'Sim;Não'];
			//$this->form[] = ['label'=>'Dedos Em Garra','name'=>'DedosEmGarra','type'=>'radio','width'=>'col-sm-10','dataenum'=>'Sim;Não'];
			//$this->form[] = ['label'=>'Sinal Da Prece','name'=>'SinalDaPrece','type'=>'radio','width'=>'col-sm-10','dataenum'=>'Sim;Não'];
			//$this->form[] = ['label'=>'Sensibilidade Protetora Ponto 1 Direito','name'=>'SensibilidadeProtetoraP1D','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Sensibilidade Protetora Ponto 2 Direito','name'=>'SensibilidadeProtetoraP2D','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Sensibilidade Protetora Ponto 3 Direito','name'=>'SensibilidadeProtetoraP3D','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Sensibilidade Protetora Ponto 4 Direito','name'=>'SensibilidadeProtetoraP4D','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Sensibilidade Protetora Ponto 5 Direito','name'=>'SensibilidadeProtetoraP5D','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Sensibilidade Protetora Ponto 1 Esquerdo','name'=>'SensibilidadeProtetoraP1E','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Sensibilidade Protetora Ponto 2 Esquerdo','name'=>'SensibilidadeProtetoraP2E','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Sensibilidade Protetora Ponto 3 Esquerdo','name'=>'SensibilidadeProtetoraP3E','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Sensibilidade Protetora Ponto 4 Esquerdo','name'=>'SensibilidadeProtetoraP4E','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Sensibilidade Protetora Ponto 5 Esquerdo','name'=>'SensibilidadeProtetoraP5E','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Monofilamento Alterado','name'=>'MonofilamentoAlterado','type'=>'radio','width'=>'col-sm-10','dataenum'=>'Sim;Não'];
			//$this->form[] = ['label'=>'Sensibilidade vibratório diminuída ou ausente','name'=>'SVDA','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'D;E'];
			//$this->form[] = ['label'=>'STDA','name'=>'STDA','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'D;E'];
			//$this->form[] = ['label'=>'Sensibilidade dolorosa diminuída ou ausente','name'=>'SDDA','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'D;E'];
			//$this->form[] = ['label'=>'Sensibilidade ao frio diminuída ou ausente','name'=>'SFDA','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'D;E'];
			//$this->form[] = ['label'=>'Reflexos aquileus diminuídos ou ausentes','name'=>'RADA','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'D;E'];
			//$this->form[] = ['label'=>'PSP','name'=>'PSP','type'=>'radio','width'=>'col-sm-10','dataenum'=>'Sim;Não'];
			//$this->form[] = ['label'=>'Estesiometria Eletrônica DIR 1','name'=>'EEDIR1','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Estesiometria Eletrônica DIR 2','name'=>'EEDIR2','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Estesiometria Eletrônica DIR 3','name'=>'EEDIR3','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Estesiometria Eletrônica DIR 4','name'=>'EEDIR4','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Estesiometria Eletrônica DIR 5','name'=>'EEDIR5','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Estesiometria Eletrônica ESQ 1','name'=>'EEE1','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Estesiometria Eletrônica ESQ 2','name'=>'EEE2','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Estesiometria Eletrônica ESQ 3','name'=>'EEE3','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Estesiometria Eletrônica ESQ 4','name'=>'EEE4','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Estesiometria Eletrônica ESQ 5','name'=>'EEE5','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Pé direito pulso arterial pedioso','name'=>'PDPAP','type'=>'radio','width'=>'col-sm-10','dataenum'=>'Presente;Diminuído ou Ausente'];
			//$this->form[] = ['label'=>'Pé direito pulso arterial tibial posterior','name'=>'PATP','type'=>'radio','width'=>'col-sm-10','dataenum'=>'Presente;Diminuído ou Ausente'];
			//$this->form[] = ['label'=>'Pé Esquerdo pulso arterial pedioso','name'=>'PEPAP','type'=>'radio','width'=>'col-sm-10','dataenum'=>'Presente;Diminuído ou Ausente'];
			//$this->form[] = ['label'=>'Pé Esquerdo pulso arterial tibial posterior','name'=>'PEPATP','type'=>'radio','width'=>'col-sm-10','dataenum'=>'Presente;Diminuído ou Ausente'];
			//$this->form[] = ['label'=>'Amputação','name'=>'Amputacao','type'=>'radio','width'=>'col-sm-10','dataenum'=>'Presente;Diminuído ou Ausente'];
			//$this->form[] = ['label'=>'Ulcera Prévia','name'=>'UlceraPrevia','type'=>'radio','width'=>'col-sm-10','dataenum'=>'Sim;Não'];
			//$this->form[] = ['label'=>'Ulcera Ativa','name'=>'UlceraAtiva','type'=>'radio','width'=>'col-sm-10','dataenum'=>'Presente;Diminuído ou Ausente'];
			//$this->form[] = ['label'=>'Classificação do Risco e Seguimento','name'=>'ClassificacaoRisco','type'=>'select','width'=>'col-sm-10','dataenum'=>'0;1;2;3'];
			//$this->form[] = ['label'=>'Teste Muscular Manual Sóleo e Gastrocnêmio D','name'=>'TMMSGD','type'=>'select','width'=>'col-sm-10','dataenum'=>'Grau 0;Grau 1;Grau 2;Grau 3;Grau 4;Grau 5'];
			//$this->form[] = ['label'=>'Teste Muscular Manual Sóleo e Gastrocnêmio E','name'=>'TMMSGE','type'=>'select','width'=>'col-sm-10','dataenum'=>'Grau 0;Grau 1;Grau 2;Grau 3;Grau 4;Grau 5'];
			//$this->form[] = ['label'=>'Teste Muscular Manual Tibial Anterior D','name'=>'TMMTAD','type'=>'select','width'=>'col-sm-10','dataenum'=>'Grau 0;Grau 1;Grau 2;Grau 3;Grau 4;Grau 5'];
			//$this->form[] = ['label'=>'Teste Muscular Manual Tibial Anterior E','name'=>'TMMTAE','type'=>'select','width'=>'col-sm-10','dataenum'=>'Grau 0;Grau 1;Grau 2;Grau 3;Grau 4;Grau 5'];
			//$this->form[] = ['label'=>'Escala de Equilíbrio de Berg','name'=>'EscalaBerg','type'=>'text','width'=>'col-sm-10'];
			# OLD END FORM

			/* 
	        | ---------------------------------------------------------------------- 
	        | Sub Module
	        | ----------------------------------------------------------------------     
			| @label          = Label of action 
			| @path           = Path of sub module
			| @foreign_key 	  = foreign key of sub table/module
			| @button_color   = Bootstrap Class (primary,success,warning,danger)
			| @button_icon    = Font Awesome Class  
			| @parent_columns = Sparate with comma, e.g : name,created_at
	        | 
	        */
	        $this->sub_module = array();


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Action Button / Menu
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @url         = Target URL, you can use field alias. e.g : [id], [name], [title], etc
	        | @icon        = Font awesome class icon. e.g : fa fa-bars
	        | @color 	   = Default is primary. (primary, warning, succecss, info)     
	        | @showIf 	   = If condition when action show. Use field alias. e.g : [id] == 1
	        | 
	        */
	        $this->addaction = array();


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Button Selected
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @icon 	   = Icon from fontawesome
	        | @name 	   = Name of button 
	        | Then about the action, you should code at actionButtonSelected method 
	        | 
	        */
	        $this->button_selected = array();

	                
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add alert message to this module at overheader
	        | ----------------------------------------------------------------------     
	        | @message = Text of message 
	        | @type    = warning,success,danger,info        
	        | 
	        */
	        $this->alert        = array();
	                

	        
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add more button to header button 
	        | ----------------------------------------------------------------------     
	        | @label = Name of button 
	        | @url   = URL Target
	        | @icon  = Icon from Awesome.
	        | 
	        */
	        $this->index_button = array();



	        /* 
	        | ---------------------------------------------------------------------- 
	        | Customize Table Row Color
	        | ----------------------------------------------------------------------     
	        | @condition = If condition. You may use field alias. E.g : [id] == 1
	        | @color = Default is none. You can use bootstrap success,info,warning,danger,primary.        
	        | 
	        */
	        $this->table_row_color = array();     	          

	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | You may use this bellow array to add statistic at dashboard 
	        | ---------------------------------------------------------------------- 
	        | @label, @count, @icon, @color 
	        |
	        */
	        $this->index_statistic = array();



	        /*
	        | ---------------------------------------------------------------------- 
	        | Add javascript at body 
	        | ---------------------------------------------------------------------- 
	        | javascript code in the variable 
	        | $this->script_js = "function() { ... }";
	        |
	        */
	        $this->script_js = NULL;


            /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code before index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it before index table
	        | $this->pre_index_html = "<p>test</p>";
	        |
	        */
	        $this->pre_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code after index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it after index table
	        | $this->post_index_html = "<p>test</p>";
	        |
	        */
	        $this->post_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include Javascript File 
	        | ---------------------------------------------------------------------- 
	        | URL of your javascript each array 
	        | $this->load_js[] = asset("myfile.js");
	        |
	        */
	        $this->load_js = array();
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Add css style at body 
	        | ---------------------------------------------------------------------- 
	        | css code in the variable 
	        | $this->style_css = ".style{....}";
	        |
	        */
	        $this->style_css = NULL;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include css File 
	        | ---------------------------------------------------------------------- 
	        | URL of your css each array 
	        | $this->load_css[] = asset("myfile.css");
	        |
	        */
	        $this->load_css = array();
	        
	        
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for button selected
	    | ---------------------------------------------------------------------- 
	    | @id_selected = the id selected
	    | @button_name = the name of button
	    |
	    */
	    public function actionButtonSelected($id_selected,$button_name) {
	        //Your code here
	            
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate query of index result 
	    | ---------------------------------------------------------------------- 
	    | @query = current sql query 
	    |
	    */
	    public function hook_query_index(&$query) {
	        //Your code here
	            
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate row of index table html 
	    | ---------------------------------------------------------------------- 
	    |
	    */    
	    public function hook_row_index($column_index,&$column_value) {	        
	    	//Your code here
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before add data is execute
	    | ---------------------------------------------------------------------- 
	    | @arr
	    |
	    */
	    public function hook_before_add(&$postdata) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after add public static function called 
	    | ---------------------------------------------------------------------- 
	    | @id = last insert id
	    | 
	    */
	    public function hook_after_add($id) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before update data is execute
	    | ---------------------------------------------------------------------- 
	    | @postdata = input post data 
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_edit(&$postdata,$id) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after edit public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_edit($id) {
	        //Your code here 

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command before delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_delete($id) {
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_delete($id) {
	        //Your code here

	    }



	    //By the way, you can still create your own method in here... :) 


	}