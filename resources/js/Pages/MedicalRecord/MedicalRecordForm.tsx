import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, Link, useForm, usePage } from "@inertiajs/react";
import { PageProps } from "@/types";
import { FormEventHandler } from "react";
import InputError from "@/Components/InputError";
import InputLabel from "@/Components/InputLabel";
import PrimaryButton from "@/Components/PrimaryButton";
import TextInput from "@/Components/TextInput";

export default function Dashboard({ auth, flash, medicalRecords }: PageProps) {
    const { data, setData, post, processing, errors, reset } = useForm({
        // Tetapkan properti formulir sesuai dengan kasus studi Anda
        patient_id: "",
        doctor_id: "",
        health_condition: "",
        body_temperature: "",
        prescription: null,
    });

    const submit: FormEventHandler = (e) => {
        e.preventDefault();

        post(route("medical-records.submit"));
    };

    const props = usePage().props;
    const patients = props.patients;
    const doctors = props.doctors;

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={
                <h2 className="font-semibold text-xl text-gray-800 leading-tight">
                    Form Medical Record
                </h2>
            }
        >
            <Head title="Dashboard" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">Medical Record Form</div>
                    </div>

                    <div className="mx-10 mt-5">
                        <form onSubmit={submit}>
                            <div>
                                <InputLabel htmlFor="patient_id" value="Patient" />

                                <select
                                    id="patient_id"
                                    name="patient_id"
                                    value={data.patient_id}
                                    className="mt-1 block w-full"
                                    autoComplete="patient_id"
                                    onChange={(e) =>
                                        setData("patient_id", e.target.value)
                                    }
                                >
                                    <option value="">Select a patient</option>
                                    {patients.map((patient) => (
                                        <option key={patient.id} value={patient.id}>
                                            {patient.name}
                                        </option>
                                    ))}
                                </select>

                                <InputError
                                    message={errors.patient_id}
                                    className="mt-2"
                                />
                            </div>

                            <div>
                                <InputLabel htmlFor="doctor_id" value="Doctor" />

                                <select
                                    id="doctor_id"
                                    name="doctor_id"
                                    value={data.doctor_id}
                                    className="mt-1 block w-full"
                                    autoComplete="doctor_id"
                                    onChange={(e) =>
                                        setData("doctor_id", e.target.value)
                                    }
                                >
                                    <option value="">Select a doctor</option>
                                    {doctors.map((doctor) => (
                                        <option key={doctor.id} value={doctor.id}>
                                            {doctor.name}
                                        </option>
                                    ))}
                                </select>

                                <InputError
                                    message={errors.doctor_id}
                                    className="mt-2"
                                />
                            </div>

                            <div>
                                <InputLabel
                                    htmlFor="health_condition"
                                    value="Health Condition"
                                />

                                <TextInput
                                    id="health_condition"
                                    name="health_condition"
                                    value={data.health_condition}
                                    className="mt-1 block w-full"
                                    autoComplete="health_condition"
                                    onChange={(e) =>
                                        setData("health_condition", e.target.value)
                                    }
                                    required
                                />

                                <InputError
                                    message={errors.health_condition}
                                    className="mt-2"
                                />
                            </div>

                            <div>
                                <InputLabel
                                    htmlFor="body_temperature"
                                    value="Body Temperature"
                                />

                                <TextInput
                                    id="body_temperature"
                                    name="body_temperature"
                                    value={data.body_temperature}
                                    className="mt-1 block w-full"
                                    autoComplete="body_temperature"
                                    onChange={(e) =>
                                        setData("body_temperature", e.target.value)
                                    }
                                    required
                                />

                                <InputError
                                    message={errors.body_temperature}
                                    className="mt-2"
                                />
                            </div>

                            <div>
                                <InputLabel
                                    htmlFor="prescription"
                                    value="Prescription (PDF/PNG/JPG/JPEG)"
                                />

                                <input
                                    type="file"
                                    id="prescription"
                                    name="prescription"
                                    className="mt-1 block w-full"
                                    onChange={(e) =>
                                        setData("prescription", e.target.files[0])
                                    }
                                />

                                <InputError
                                    message={errors.prescription}
                                    className="mt-2"
                                />
                            </div>

                            <div className="flex items-center justify-end mt-4">
                                <PrimaryButton
                                    className="ml-4"
                                    disabled={processing}
                                >
                                    Submit
                                </PrimaryButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}