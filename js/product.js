fetch("../controllers/productController.php")
  .then(res => res.json())
  .then(response => {

    const tableBody = document.getElementById("productTableBody");

    // Clear existing placeholder rows
    tableBody.innerHTML = "";

    // Check if may data
    if(response.status === "success" && response.data.length > 0) {
      response.data.forEach(product => {

        const row = `
          <tr class="hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
            <td class="py-4 px-6 text-white dark:text-gray-200">${product.product_name}</td>
            <td class="py-4 px-6 text-white dark:text-gray-200">${product.description}</td>
            <td class="py-4 px-6 text-white dark:text-gray-200">${product.price}</td>
            <td class="py-4 px-6 text-white dark:text-gray-200">${product.stock}</td>
            <td class="py-4 px-6 text-white dark:text-gray-200">${product.category}</td>
          </tr>
        `;

        tableBody.insertAdjacentHTML("beforeend", row);

      });

    } else {
      tableBody.innerHTML = `
        <tr>
          <td colspan="5" class="text-center py-4 text-gray-500 dark:text-gray-400">
            No products found.
          </td>
        </tr>
      `;
    }

  })
  .catch(err => console.error(err));