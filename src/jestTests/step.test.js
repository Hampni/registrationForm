const steps = require("../steps.js");

describe("First step", () => {
  let userFirst = {
    first_name: "John",
    last_name: "Smith",
    birthday: "21.01.2019",
    report_subject: "Science",
    country: "Lao+Peoples+Democratic+Republic",
    phone: "+1+(902)+130-1928",
    email: "test1@gmail.com",
  };

  test("sending valid user data will return ok", () => {
    return steps.firstStep(userFirst).then((response) => {
      expect(response).toBe("ok");
    });
  });

  test("sending same user data will return - email error", () => {
    return steps.firstStep(userFirst).then((response) => {
      expect(response.email).toBe("Such email already exists!");
    });
  });
});


