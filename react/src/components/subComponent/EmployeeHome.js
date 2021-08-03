import React from 'react';
import ProductList from './ProductList'
import AddProduct from './AddProduct'

const EmployeeHome = ()=>{
    return(
    <>
        <div className="container">
        <div className="row g-5 mt-4">
            <div className="col-6">
                <AddProduct/>
            </div>
            <div className="col-6">
                <ProductList/>
            </div>
        </div>
        </div>
    </>);
};
export default EmployeeHome;