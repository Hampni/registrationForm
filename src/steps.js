const axios = require("axios").default;

export const firstStep = async function (firstFormData) {
  return await axios
    .post("http://localhost:8000/save", firstFormData)
    .then(function (response) {
      return response.data;
    })
    .catch(function (error) {
      console.log(error);
    });
};

export const secondStep = async function (data, secondFormData) {
  return await axios
    .post("http://localhost:8000/image", data, {
      headers: {
        "Content-Type": "multipart/form-data",
      },
    })
    .then(async function () {
      return await axios
        .post("http://localhost:8000/save", secondFormData)
        .then(function (response) {
          return response.data;
        })
        .catch(function (error) {
          console.log(error);
        });
    })
    .catch(function (error) {
      console.log(error);
    });
};
