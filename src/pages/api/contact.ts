import type { APIRoute } from "astro";
import nodemailer from "nodemailer";

export const POST: APIRoute = async ({ request }) => {
	try {
		const form = await request.formData();
		const nombre = String(form.get("nombre") ?? "").trim();
		const apellidos = String(form.get("apellidos") ?? "").trim();
		const empresa = String(form.get("empresa") ?? "").trim();
		const cargo = String(form.get("cargo") ?? "").trim();
		const email = String(form.get("email") ?? "").trim();
		const telefono = String(form.get("telefono") ?? "").trim();
		const mensaje = String(form.get("mensaje") ?? "").trim();
		const privacy = form.get("privacy") !== null;
		if (
			!nombre ||
			!apellidos ||
			!empresa ||
			!cargo ||
			!email ||
			!telefono ||
			!mensaje ||
			!privacy
		) {
			return new Response(
				JSON.stringify({
					success: false,
					error: "Campos incompletos.",
				}),
				{ status: 400 }
			);
		}
		const transporter = nodemailer.createTransport({
			host: import.meta.env.SMTP_HOST,
			port: Number(import.meta.env.SMTP_PORT),
			secure: true,
			auth: {
				user: import.meta.env.SMTP_USER,
				pass: import.meta.env.SMTP_PASS,
			},
		});
		await transporter.verify();
		await transporter.sendMail({
			from: `"Web DIVCAL" <${import.meta.env.SMTP_USER}>`,
			to: import.meta.env.MAIL_TO,
			replyTo: email,
			subject: "Nuevo contacto desde la web",
			text: `
Nombre: ${nombre} ${apellidos}
Empresa: ${empresa}
Cargo: ${cargo}
Email: ${email}
Teléfono: ${telefono}
Mensaje:
${mensaje}
			`.trim(),
		});
		return new Response(
			JSON.stringify({ success: true }),
			{ status: 200 }
		);
	} catch (err: any) {
		return new Response(
			JSON.stringify({
				success: false,
				error: err.message || "Error SMTP",
			}),
			{ status: 500 }
		);
	}
};
