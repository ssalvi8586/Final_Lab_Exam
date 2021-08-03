import React, { useEffect, useState } from 'react';
import { Link } from "react-router-dom";
import axios from "axios";

const EmployeeList = () => {
    const [employee, setEmployee] = useState([]);
    useEffect(() => {
        const getAllEmployee = async () => {
            try {
                const employee = await axios.get("http://127.0.0.1:8000/api/employee");
                setEmployee(employee.data);
            } catch (error) {
                console.log(error);
            }
        }
        getAllEmployee();
    }, [])
    return (
        <>

            <table className="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th className="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    {
                        employee.map((employee, i) => {
                            return (

                                <tr key={employee.id}>
                                    <th>{i + 1}</th>
                                    <td>{employee.fname}</td>
                                    <td>{employee.contact}</td>
                                    <td>{employee.uname}</td>
                                    <td>{employee.pass}</td>
                                    <td className="text-center">
                                        <Link to={`/view/${employee.id}`}><i className="mx-4 my-auto text-success far fa-eye" /></Link>
                                        <Link to={`/edit/${employee.id}`}><i className="mx-4 my-auto text-primary fas fa-user-edit" /></Link>
                                        <Link to={``}><i className="mx-4 my-auto text-danger fas fa-trash-alt" /></Link>
                                    </td>
                                </tr>
                            );
                        })
                    }

                </tbody>
            </table>
        </>
    );
};

export default EmployeeList;
