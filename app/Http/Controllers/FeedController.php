<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feed;

class FeedController extends Controller
{
    public function index()
    {
        return view('feeds.index');
    }

    public function showRegisterPage()
    {
        return view('feeds.register');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'intended_for_animal' => 'required|string|max:255',
            'weight' => 'required|numeric|min:0.1',
            'price' => 'required|numeric|min:0.01',
        ]);

        $feed = new Feed();
        $feed->name = $request->input('name');
        $feed->type = $request->input('type');
        $feed->intended_for_animal = $request->input('intended_for_animal');
        $feed->weight = $request->input('weight');
        $feed->price = $request->input('price');
        $feed->save();

        return redirect('/feeds')->with('success', 'Feed registered successfully.');
    }


    public function showEditPage(Feed $feed)
    {
        return view('feeds.edit', compact('feed'));
    }

    public function editFeed(Request $request, Feed $feed)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'intended_for_animal' => 'required|string|max:255',
            'weight' => 'required|numeric|min:0.1',
            'price' => 'required|numeric|min:0.01',
        ]);

        $feed->update($validatedData);

        return redirect()->route('feeds.index')->with('success', 'Feed updated successfully.');
    }

    public function getPigFeed() {
        $pigFeed = Feed::where('intended_for_animal', 'pigs')->get();
        return view('feeds.pigs', compact('pigFeed'));
    }

    public function getCattleFeed() {
        $cattleFeed = Feed::where('intended_for_animal', 'cattle')->get();
        return view('feeds.cattle', compact('cattleFeed'));
    }

    public function getSheepFeed() {
        $sheepFeed = Feed::where('intended_for_animal', 'sheep')->get();
        return view('feeds.sheep', compact('sheepFeed'));
    }

    public function getGoatFeed() {
        $goatFeed = Feed::where('intended_for_animal', 'goats')->get();
        return view('feeds.goats', compact('goatFeed'));
    }

    public function deleteFeed(Feed $feed)
    {
        $feed->delete();

        return redirect()->route('feeds.index')->with('success', 'Feed deleted successfully.');
    }

}
