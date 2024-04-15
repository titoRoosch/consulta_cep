<template>
    <div class="container d-flex flex-column align-items-center justify-content-center vh-100">
        <h1>Consulta de Cep</h1>

        <div class="input-group mb-3 mt-3">
            <input type="text" class="form-control" placeholder="Digite o CEP" v-model="cepInput" @input="formatarCEP">
        </div>
        <button class="btn btn-success" type="button" @click.prevent="triggerEndpoint">Consultar</button>

        <p v-if="validationError" class="mt-3">{{ validationError }}</p>

        <div v-if="response">
        <h3>Dados da API:</h3>
            <ul>
                <li v-for="(value, key) in response.data.data" :key="key">
                    <strong>{{ key }}:</strong> {{ value }}
                </li>
            </ul>
        </div>

        <button @click="$router.push('/')" class="btn btn-primary mt-3">Voltar</button>
    </div>
</template>

<script>
import axios from "axios";
import { ref } from "vue";

export default {
    setup() {
        const cepInput = ref('');
        const response = ref(null);
        const validationError = ref(null);

        const triggerEndpoint = async () => {
            try {
                validationError.value = null;
                response.value = null;
                const cep = cepInput.value;
                if(cep == "" || cep.length < 9) {
                    validationError.value = 'Input inválido';
                    return;
                }
                const retorno = await axios.get("/api/cep/" + cep);
                if (retorno.data.data.hasOwnProperty('erro')) {
                    validationError.value = 'Cep inexistente';
                    return
                }

                response.value = retorno;


            } catch (error) {
                console.log(error);
                validationError.value = 'Nenhum dado foi encontrado';
            }
        };

        // Método para formatar o valor do campo de texto como um CEP
        const formatarCEP = () => {
            let cep = cepInput.value.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
            cep = cep.substring(0, 8); // Garante que o CEP tenha no máximo 8 dígitos
            cep = cep.replace(/(\d{5})(\d)/, '$1-$2'); // Adiciona o traço ao CEP (formato de máscara)
            cepInput.value = cep; // Atualiza o valor do campo de texto com o CEP formatado
        };

        // Retorne cepInput como uma propriedade reativa e o método formatarCEP
        return { cepInput, response, validationError, triggerEndpoint, formatarCEP };
    }
};
</script>
