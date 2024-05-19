export default function StadiumProfile({params}: { params: { slug: string } }) {
    return <main className="flex min-h-screen flex-col items-center justify-between p-24">
        <div>{params.slug} Stadium</div>
    </main>
}
