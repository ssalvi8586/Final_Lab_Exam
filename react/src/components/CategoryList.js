import React, { useEffect, useState } from 'react';
import { Link } from "react-router-dom";
import axios from "axios";

const CategoryList = () => {
    const [categories, setCategories] = useState([]);
    useEffect(() => {
        const getAllCategories = async () => {
            try {
                const categories = await axios.get("http://127.0.0.1:8000/api/categories");
                // console.log(categories.data);
                setCategories(categories.data);
            } catch (error) {
                console.log(error);
            }
        }
        getAllCategories();
    }, [])
    return (
        <>

            <table className="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Category</th>
                        <th className="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    {
                        categories.map((categories, i) => {
                            return (

                                // <tr key={Math.random()}>
                                <tr key={categories.id}>
                                    <th>{i + 1}</th>
                                    <td>{categories.name}</td>
                                    <td className="text-center">
                                        <Link to={`/view/${categories.id}`}><i className="mx-4 my-auto text-success far fa-eye" /></Link>
                                        <Link to={`/edit/${categories.id}`}><i className="mx-4 my-auto text-primary fas fa-user-edit" /></Link>
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

export default CategoryList;
