// Importe o módulo jwt-decode
const jwtDecode = require('jwt-decode');

// Token JWT real recebido do servidor após o login
const token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c';

try {
  // Decodifique o token
  const decodedToken = jwtDecode(token);

  // Exiba o resultado
  console.log(decodedToken);
} catch (error) {
  console.error('Erro ao decodificar o token:', error.message);
}
