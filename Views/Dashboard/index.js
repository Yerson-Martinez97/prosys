//* ===================== LISTENER ====================================
document.addEventListener("DOMContentLoaded", async function () {
  try {
    const resTotalUsers = await findTotalActives("user");
    renderTotalUsers(resTotalUsers);
    const resTotalCustomers = await findTotalActives("customer");
    renderTotalCustomers(resTotalCustomers);
    const resTotalAppliances = await findTotalActives("appliance");
    renderTotalAppliances(resTotalAppliances);
    const resTotalRepairs = await findTotal("repair");
    renderTotalRepairs(resTotalRepairs);
  } catch (error) {
    console.error("Ha ocurrido un error:", error);
  }
});
//* ===================== RENDERS ====================================
async function findTotalActives(name) {
  try {
    const url = `${base_url}Dashboard/findTotalActives/${name}`;
    const response = await fetch(url);
    if (!response.ok)
      throw new Error(
        "Hubo un problema con la solicitud de datos de total de usuarios"
      );
    const userData = await response.json();
    return userData.total;
  } catch (error) {
    console.error("Error al recuperar el total de usuarios:", error);
    throw error;
  }
}
//* -------------------------------------------------------------------------------------------------
async function findTotal(name) {
  try {
    const url = `${base_url}Dashboard/findTotal/${name}`;
    const response = await fetch(url);
    if (!response.ok)
      throw new Error(
        "Hubo un problema con la solicitud de datos de total de usuarios"
      );
    const userData = await response.json();
    return userData.total;
  } catch (error) {
    console.error("Error al recuperar el total de usuarios:", error);
    throw error;
  }
}
//* -------------------------------------------------------------------------------------------------
function renderTotalUsers(res) {
  let element = document.getElementById("totalUsers");
  if (element) {
    element.innerHTML = res;
  }
}
function renderTotalCustomers(res) {
  let element = document.getElementById("totalCustomers");
  if (element) {
    element.innerHTML = res;
  }
}
function renderTotalAppliances(res) {
  let element = document.getElementById("totalAppliances");
  if (element) {
    element.innerHTML = res;
  }
}
function renderTotalRepairs(res) {
  let element = document.getElementById("totalRepairs");
  if (element) {
    element.innerHTML = res;
    element.inertHTML = "ok";
  }
}
