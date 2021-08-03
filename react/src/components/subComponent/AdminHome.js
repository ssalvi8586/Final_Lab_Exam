import React from 'react';
import Register from './Register'
import EmployeeList from './EmployeeList'

const AdminHome = ()=>{
    return(<>
        <div className="container">
        <div className="row g-5 mt-4">
            <div className="col-4">
                <Register/>
            </div>
            <div className="col-8">
                <EmployeeList/>
            </div>
        </div>
        </div>
    </>);
};
export default AdminHome;